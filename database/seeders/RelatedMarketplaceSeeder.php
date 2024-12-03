<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use App\Models\RelatedMarketplace;
use Illuminate\Database\Seeder;

class RelatedMarketplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = ProductDetail::all()->count();
        RelatedMarketplace::factory(rand($count / 2, $count * 2))->create();
    }
}
