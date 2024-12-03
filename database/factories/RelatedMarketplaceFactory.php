<?php

namespace Database\Factories;

use App\Models\ProductDetail;
use App\Models\RelatedMarketplace;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RelatedMarketplace>
 */
class RelatedMarketplaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $allIds = ProductDetail::pluck('id')->toArray();

        $marketplaceName = '';
        $selected = null;
        $counter = 0;

        while ($counter < 32) {
            $variantId = fake()->randomElement($allIds);
            $selected = ProductDetail::where('id', '=', $variantId)->get()->first();
            $marketplaceName = fake()->randomElement(['Tokopedia', 'Shopee', 'Zalora']);

            $related = RelatedMarketplace::
                where('id', '=', $selected->id)->
                where('name', '=', $marketplaceName)->get();

            $counter++;
            if ($related->isEmpty()) break;
        }

        return [
            'url' => fake()->url(),
            'name' => $marketplaceName,
            'product_detail_id' => $selected,
        ];
    }
}
