<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariant extends Model
{
    /** @use HasFactory<\Database\Factories\ProductVariantFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'slug',
        'product_id',
    ];

    protected $with = [
        'detail',
        'promo',
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

    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }

    public function detail(): MorphOne
    {
        return $this->morphOne(ProductDetail::class, 'detailable')->chaperone();
    }

    public function promo(): MorphOne
    {
        return $this->morphOne(Promo::class, 'promoable')->ofMany([
            'applies_to' => 'max',
        ], function (Builder $query) {
            $query->where('applies_to', '<=', now())->where('expired_at', '>=', now());
        });
    }

    public function scopeFilter(Builder $query, array $filters): Builder {
        $query->when($filters['category'] ?? false, fn($query, $category)
            => $query->whereHas('product.categories', fn($query)
                => $query->where('categories.id', $category->id)
            )
        );

        return $query;
    }
}
