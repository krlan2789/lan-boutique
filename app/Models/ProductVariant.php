<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
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
        'status',
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

    public function product(): BelongsTo
    {
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

    public function scopeFilter(Builder $query, array|Collection $filters)
    {
        return $query
            ->where('status', '>', 0)
            ->byCategory($filters['category'] ?? null)
            ->byDetail('tags', $filters['tags'] ?? null)
            ->byDetail('colors', $filters['colors'] ?? null)
            ->byDetail('size', $filters['size'] ?? null)
        ;
    }

    public function scopeByCategory(Builder $query, Category|null $category)
    {
        $query->when(
            $category ?? false,
            fn($query)
            => $query->whereHas(
                'product.categories',
                fn($query) => $query
                    // ->whereHas('products.detail', fn($query) => $query->where('categories.id', $category->id))
                    ->orWhereHas('products.variants.detail', fn($query) => $query->where('categories.id', $category->id))
            )
        );
        return $query;
    }

    public function scopeByDetail(Builder $query, string $column, string|array|Collection|null $values)
    {
        if (is_string($values)) {
            $values = str_contains($values, ',') ? explode(',', $values) : [$values];
        }

        $query->when(
            $values ?? false,
            function ($query) use ($column, $values) {
                $query->where(function ($query) use ($column, $values) {
                    $query->whereHas(
                        'detail',
                        fn($query) => $query->where($column, 'LIKE', "%$values[0]%")
                    );
                    for ($i = 1; $i < count($values); $i++) {
                        $query->whereHas(
                            'detail',
                            fn($query) => $query->orWhere($column, 'LIKE', "%$values[$i]%")
                        );
                        // ->orWhereHas(
                        //     'product.detail',
                        //     fn($query) => $query->where($column, 'LIKE', "%$values[$i]%")
                        // );
                    }
                });
            }
        );
        return $query;
    }

    public function scopeOthers(Builder $query, int $id)
    {
        $query->when(
            $id ?? false,
            fn($query, $id)
            => $query->with('product.variants')->whereHas(
                'product.variants',
                fn($query)
                => $query->where('product_variants.id', '!=', $id)
                //->where('products.id', '==', 'product_variants.product_id')
            )
        );
        return $query;
    }

    public static function formated(array|Collection $raw)
    {
        $items = collect([]);
        foreach ($raw as $variant) {
            $detail = $variant->detail;// ?? $variant->product->detail;
            $promo = $variant->promo ?? ($product->promo ?? null);
            $promoPrice = 0;
            if ($promo) {
                $value = $promo->discount > 0 ? ($variant->price * (floatval($promo->discount) / 100.0)) : $promo->nominal;
                // if ($promo->discount > 0 && $value > $promo->nominal_max) $value = $promo->nominal_max;
                if ($promo->discount > 0 && $value > $variant->price)
                    $value = $variant->price;

                $promoPrice = $variant->price - $value;
            }

            $images = [];
            if ($detail) {
                foreach ($detail->images as $value) {
                    $images[] = Str::replace('.jpg', '_10(0.1).jpg', $value);
                }
            }

            $items->add([
                "name" => $variant->product->name,
                "url" => "/pv/$variant->slug",
                "variantId" => $variant->id,
                "variantName" => $variant->name,
                "price" => $variant->price,
                "promoPrice" => $promoPrice,
                "colors" => $detail->colors ?? [],
                "tags" => $detail->tags ?? [],
                "size" => $detail->size ?? [],
                "imageUrl" => $images ?? [],
                // "imageUrl" => Str::replace('.jpg', '_10(0.1).jpg', $detail->images[0]) ?? '',
            ]);
        }

        return $items;
    }
}
