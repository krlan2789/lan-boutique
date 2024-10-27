<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
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

        return view('components.product.overview', [
            'data' => $productVariant,
            'detail' => $productVariant->detail ?? $productVariant->product->detail,
            "url_p" => "/p/" . $productVariant->product->slug,
            'price' => $price,
            'promo' => $appliedPromo,
        ]);
    }
}
