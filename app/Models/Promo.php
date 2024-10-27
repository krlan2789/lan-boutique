<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Promo extends Model
{
    /** @use HasFactory<\Database\Factories\PromoFactory> */
    use HasFactory;

    protected $fillable = ['name', 'code', 'description', 'discount', 'nominal', 'nominal_max', 'min_purchase', 'promoable', 'applies_to', 'expired_at'];

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
            'applies_to' => 'datetime',
            'expired_at' => 'datetime',
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'promo_products');
    }

    public function productVariants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class, 'promo_product_variants');
    }

    public function promoable(): MorphTo
    {
        return $this->morphTo();
    }
}
