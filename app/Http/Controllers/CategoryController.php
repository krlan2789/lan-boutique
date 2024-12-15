<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;
use App\Models\ProductVariant;

class CategoryController extends Controller
{
    public function variants(Category $category)
    {
        $filters = array_merge(['category' => $category], request(['tags', 'colors', 'size', 'sort']));
        $productVariants = ProductVariant::with(['product'])
            ->filter($filters)
            ->paginate(20)
            ->withQueryString()
        ;

        // return [$filters, $productVariants->items()];

        $items = ProductVariant::formated($productVariants->items());

        $all = ProductDetail::all();
        $tags = $all->pluck('tags')->flatten()->unique()->sort()->values();
        $colors = $all->pluck('colors')->flatten()->unique()->sort()->values();
        $size = $all->pluck('size')->flatten()->unique()->values();

        $results = [
            'items' => $items,
            'variants' => $productVariants,
        ];
        $filters = [
            'tags' => $tags,
            'colors' => $colors,
            'size' => $size,
        ];
        return view('components.layout.list-view', [
            'title' => $category->name,
            'viewType' => 'filter',
            'results' => $results,
            'filters' => $filters,
        ]);
    }
}
