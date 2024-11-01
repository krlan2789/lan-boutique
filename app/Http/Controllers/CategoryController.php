<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $products = $category->products()->with(['variants', 'detail', 'promo'])->get();
        $items = collect(Product::formated($products));

        return view('components.layout.list-view', [
            'title' => $category->name,
            'viewType' => 'filter',
            'items' => $items,
        ]);
    }

    public function variants(Category $category)
    {
        $productVariants = ProductVariant::with(['product', 'product.detail'])
            ->filter(['category' => $category])
            ->paginate(20)
            ->withQueryString()
            ;

        $items = ProductVariant::formated($productVariants->items());

        $results = ['items' => $items, 'variants' => $productVariants];
        return view('components.layout.list-view', [
            'title' => $category->name,
            'viewType' => 'filter',
            'results' => $results,
        ]);
    }
}
