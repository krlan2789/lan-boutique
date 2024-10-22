<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
        return view('components.product.overview', [
            'title' => $productVariant->name,
            'data' => $productVariant,
        ]);
    }
}
