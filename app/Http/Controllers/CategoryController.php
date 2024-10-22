<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $items = collect([]);
        foreach ($category->products as $product) {
            foreach ($product->variants as $variant) {
                $items->add([
                    "name" => $product->name,
                    "colors" => $product->colors,
                    "variantId" => $variant->id,
                    "variantName" => $variant->name,
                    "price" => $variant->price,
                    "images" => $variant->images,
                    "url" => "/pv/$variant->code",
                ]);
            }
        }

        return view('components.layout.list-view', [
            'title' => $category->name,
            'items' => $items,
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
