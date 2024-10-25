<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetail>
 */
class ProductDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colors = collect([]);
        $colorCount = rand(0, 5);
        for ($a = 0; $a < $colorCount; $a++) {
            $c = fake('en_US')->safeColorName();
            if (!$colors->contains($c)) $colors->add($c);
            else $a--;
        }

        $size = fake()->randomElement([
            ['XS/S', 'M/L', 'XL/2XL'],
            [],
            ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL'],
            [],
            ['36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46'],
            [],
            ['27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38'],
        ]);

        $highlights = fake()->words(rand(0, 10));
        $tags = fake()->words(rand(1, 6));

        $availableImages = [];
        for ($i = 1; $i <= 46; $i++) {
            $availableImages [] = "/img/products/product.$i.jpg";
        }
        $images = fake()->randomElements($availableImages, rand(2, 8));

        $useProduct = rand(0, 20) % 2 == 0;
        $detailableType = $useProduct ? Product::class : ProductVariant::class;
        $allIds = $useProduct ? Product::pluck('id')->toArray() : ProductVariant::pluck('id')->toArray();
        $detailableId = fake()->randomElement($allIds);

        return [
            'summary' => fake()->realText(128),
            'product_code' => fake()->creditCardNumber(separator: ''),
            'description' => fake()->realText(512),
            'tags' => $tags,
            'images' => $images,
            'highlights' => $highlights,
            'colors' => $colors,
            'size' => $size,
            'detailable_id' => $detailableId,
            'detailable_type' => $detailableType,
        ];
    }
}
