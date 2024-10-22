<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::all();
        for ($i = 0; $i < 20; $i++) {
            Product::factory(1)->hasAttached($category->random(rand(1, 3)))->create();
        }
    }
}
