<?php

namespace App\Http\Controllers;

use DOMDocument;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class ProductVariantController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
        $others = $productVariant->others($productVariant->id)->limit(8)->get()->flatten();

        $appliedPromo = [];
        $price = $productVariant->price;
        $promo = $productVariant->promo ?? $productVariant->product->promo;
        if ($promo) {
            $appliedPromo['isPercent'] = $promo->discount > 0;

            $value = $appliedPromo['isPercent'] ? ($productVariant->price * (floatval($promo->discount) / 100.0)) : $promo->nominal;
            // if ($appliedPromo['isPercent'] && $value > $promo->nominal_max) $value = $promo->nominal_max;
            if ($appliedPromo['isPercent'] && $value > $price) $value = $price;
            $price -= $value;

            $appliedPromo['nominal'] = $appliedPromo['isPercent'] ? $promo->discount : $value;
        }
        $detail = $productVariant->detail ?? $productVariant->product->detail;

        $getFavicon = function($url) {
            return 'https://www.google.com/s2/favicons?domain=' . explode('/', $url)[2];
        };
        $getTitle = function($url) {
            try {
                $html = file_get_contents($url);
                if ($html === FALSE) return null;
                else
                {
                    // Use DOMDocument to parse the HTML
                    $doc = new DOMDocument();
                    @$doc->loadHTML($html);
                    // Extract the title
                    $title = $doc->getElementsByTagName('title')->item(0)->nodeValue;
                    return $title;
                }
            } catch (\Throwable $th) {
                return null;
            }
        };

        return view('components.product.overview', [
            'data' => $productVariant,
            'detail' => $detail,
            "url" => "/p/" . $productVariant->product->slug,
            'price' => $price,
            'promo' => $appliedPromo,
            'moreItems' => ProductVariant::formated($others),
            'getFavicon' => $getFavicon,
            'getTitle' => $getTitle,
        ]);
    }

    public function latest()
    {
        $variants = ProductVariant::with(['product'])
            ->latest('created_at')
            ->limit(24)
            ->get()
            ->flatten();

        $variants = ProductVariant::formated($variants);

        return view('components.layout.list-view', [
            'title' => 'New Arrival',
            'viewType' => 'new-arrival',
            // 'viewType' => 'simple',
            'results' => ['items' => $variants],
        ]);
    }

    public function latestCategory(Category $category)
    {
        $variants = ProductVariant::with(['product', 'product.detail'])
            ->filter(['category' => $category])
            ->latest('created_at')
            ->limit(24)
            ->get()
            ;

        $variants = ProductVariant::formated($variants);

        return view('components.layout.list-view', [
            'title' => "$category->name - New Arrival",
            'viewType' => 'new-arrival-category',
            'results' => ['items' => $variants],
        ]);
    }

    public function latestAll()
    {
        $variants = ProductVariant::with(['product', 'product.detail'])
            ->latest('created_at')
            ->limit(24)
            ->get()
            ;

        $variants = ProductVariant::formated($variants);

        return view('components.layout.list-view', [
            'title' => "All - New Arrival",
            'viewType' => 'new-arrival-category',
            'results' => ['items' => $variants],
        ]);
    }
}
