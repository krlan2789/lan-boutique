<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductDetail extends Model
{
    /** @use HasFactory<\Database\Factories\ProductDetailFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'summary',
        'product_name',
        'description',
        'tags',
        'images',
        'highlights',
        'colors',
        'size',
        // 'product_variant_id',
        'detailable',
    ];

    protected $with = [
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
            'tags' => 'array',
            'images' => 'array',
            'highlights' => 'array',
            'colors' => 'array',
            'size' => 'array',
        ];
    }

    public function detailable(): MorphTo
    {
        return $this->morphTo();
    }

    public function variant(): HasOne
    {
        return $this->hasOne(ProductVariant::class);
    }

    public function marketplaces(): HasMany
    {
        return $this->hasMany(RelatedMarketplace::class);
    }
}
