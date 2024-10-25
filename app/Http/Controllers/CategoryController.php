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
                $detail = $variant->detail ?? $product->detail;
                if ($detail) {
                    $items->add([
                        "name" => $product->name,
                        "url" => "/pv/$variant->slug",
                        "variantId" => $variant->id,
                        "variantName" => $variant->name,
                        "price" => $variant->price,
                        "colors" => $detail->colors ?? [],
                        "images" => $detail->images ?? [],
                    ]);
                }
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
