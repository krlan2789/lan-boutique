<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $with = [
        // 'categories',
        // 'variants',
        // 'detail',
        // 'promo',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function variants(): HasMany {
        return $this->hasMany(ProductVariant::class);
    }

    public function detail(): MorphOne
    {
        return $this->morphOne(ProductDetail::class, 'detailable')->chaperone();
    }

    // public function promos(): MorphMany
    // {
    //     return $this->morphMany(Promo::class, 'promoable');
    // }

    public function promo(): MorphOne
    {
        return $this->morphOne(Promo::class, 'promoable')->ofMany([
            'applies_to' => 'max',
        ], function (Builder $query) {
            $query->where('applies_to', '<=', now())->where('expired_at', '>=', now());
        });
    }
}
