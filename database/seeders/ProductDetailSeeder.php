<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = ProductVariant::all()->count();
        ProductDetail::factory($count)->create();
    }
}
