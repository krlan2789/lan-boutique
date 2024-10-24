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
                    "url" => "/pv/$variant->slug",
                    "variantId" => $variant->id,
                    "variantName" => $variant->name,
                    "price" => $variant->price,
                    "colors" =>
                        $variant->detail && $variant->detail->colors ?
                        $variant->detail->colors :
                        ($product->detail ? $product->detail->colors : []),
                    "images" =>
                        $variant->detail && $variant->detail->images ?
                        $variant->detail->images :
                        ($product->detail ? $product->detail->images : []),
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
