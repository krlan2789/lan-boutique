<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::create([
        //     "name" => "Women",
        //     "code" => "women"
        // ]);
        // Category::create([
        //     "name" => "Men",
        //     "code" => "men"
        // ]);
        // Category::create([
        //     "name" => "Top",
        //     "code" => "top"
        // ]);
        // Category::create([
        //     "name" => "Bottom",
        //     "code" => "bottom"
        // ]);
        // Category::create([
        //     "name" => "Accessories",
        //     "code" => "accessories"
        // ]);

        // $products = Product::all();
        // Category::factory(5)->hasAttached($products->random(rand(1, $products->count())))->create();

        Category::factory(5)->create();
    }
}
