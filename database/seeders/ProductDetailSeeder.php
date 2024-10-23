<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = ProductVariant::all()->count();
        ProductDetail::factory(rand($count / 2, $count))->create();
    }
}
