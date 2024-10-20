<?php

namespace App\Http\Controllers;

use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function index(ProductVariant $productVariant)
    {
        return view('components.layout.list-view', [
            'title' => $productVariant->name,
            'componentItem' => 'layout.card-item',
            'items' => $productVariant,
        ]);
    }
}
