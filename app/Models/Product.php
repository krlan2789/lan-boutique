<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    public function promo(): MorphOne
    {
        return $this->morphOne(Promo::class, 'promoable')->ofMany([
            'applies_to' => 'max',
        ], function (Builder $query) {
            $query->where('applies_to', '<=', now())->where('expired_at', '>=', now());
        });
    }

    public static function formated($raw)
    {
        $items = collect([]);
        foreach ($raw as $product) {
            foreach ($product->variants as $variant) {
                $detail = $variant->detail ?? $product->detail;
                $promo = $variant->promo ?? ($product->promo ?? null);
                if ($detail) {
                    $promoPrice = 0;
                    if ($promo) {
                        $value = $promo->discount > 0 ? ($variant->price * (floatval($promo->discount) / 100.0)) : $promo->nominal;
                        // if ($promo->discount > 0 && $value > $promo->nominal_max) $value = $promo->nominal_max;
                        if ($promo->discount > 0 && $value > $variant->price) $value = $variant->price;

                        $promoPrice = $variant->price - $value;
                    }

                    $images = [];
                    foreach ($detail->images as $value) {
                        $images[] = Str::replace('.jpg', '_10(0.1).jpg', $value);
                    }

                    $items->add([
                        "name" => $product->name,
                        "url" => "/pv/$variant->slug",
                        "variantId" => $variant->id,
                        "variantName" => $variant->name,
                        "price" => $variant->price,
                        "promoPrice" => $promoPrice,
                        "colors" => $detail->colors ?? [],
                        "imageUrl" => $images ?? [],
                        // "imageUrl" => Str::replace('.jpg', '_10(0.1).jpg', $detail->images[0]) ?? '',
                    ]);
                }
            }
        }
        return $items;
    }
}
