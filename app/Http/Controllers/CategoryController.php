<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $products = $category->products()->with(['variants', 'detail', 'promo'])->get();
        $items = collect([]);
        foreach ($products as $product) {
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

                    $items->add([
                        "name" => $product->name,
                        "url" => "/pv/$variant->slug",
                        "variantId" => $variant->id,
                        "variantName" => $variant->name,
                        "price" => $variant->price,
                        "promoPrice" => $promoPrice,
                        "colors" => $detail->colors ?? [],
                        "imageUrl" => Str::replace('.jpg', '_10(0.1).jpg', $detail->images[0]) ?? '',
                    ]);
                }
            }
        }

        return view('components.layout.list-view', [
            'title' => $category->name,
            'items' => $items,
        ]);
    }

    public function variants(Category $category)
    {
        $productVariants = ProductVariant::with(['product'])
            ->whereHas('product.categories', function($query) use ($category) { $query->where('categories.id', $category->id); })
            // ->get()
            ->paginate(20)
            ->withQueryString()
            ;

        // return response()->json($productVariants);

        $items = collect([]);
        foreach ($productVariants->items() as $variant) {
            $detail = $variant->detail ?? $variant->product->detail;
            $promo = $variant->promo ?? ($product->promo ?? null);
            if ($detail) {
                $promoPrice = 0;
                if ($promo) {
                    $value = $promo->discount > 0 ? ($variant->price * (floatval($promo->discount) / 100.0)) : $promo->nominal;
                    // if ($promo->discount > 0 && $value > $promo->nominal_max) $value = $promo->nominal_max;
                    if ($promo->discount > 0 && $value > $variant->price) $value = $variant->price;

                    $promoPrice = $variant->price - $value;
                }

                $items->add([
                    "name" => $variant->product->name,
                    "url" => "/pv/$variant->slug",
                    "variantId" => $variant->id,
                    "variantName" => $variant->name,
                    "price" => $variant->price,
                    "promoPrice" => $promoPrice,
                    "colors" => $detail->colors ?? [],
                    "imageUrl" => Str::replace('.jpg', '_10(0.1).jpg', $detail->images[0]) ?? '',
                ]);
            }
        }

        return view('components.layout.list-view', [
            'title' => $category->name,
            'items' => $items,
            'variants' => $productVariants,
        ]);
    }

    public function latest()
    {
        return view('components.layout.list-view', [
            'title' => 'New Arrival',
            'componentItem' => 'layout.card-item',
            'items' => [],
        ]);
    }
}
