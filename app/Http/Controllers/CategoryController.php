<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('components.layout.list-view', [
            'title' => $category->name,
            'componentItem' => 'layout.card-item',
            'items' => [],//$category->products(),
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
