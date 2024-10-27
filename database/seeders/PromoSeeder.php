<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = Product::all()->count() * 4;
        Promo::factory(rand($count / 3, $count))->create();
    }
}
