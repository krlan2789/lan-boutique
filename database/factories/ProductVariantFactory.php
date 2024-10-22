<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->streetName();
        $desc = rand(1, 9) % 2 == 0 ? null : fake()->sentence(rand(0, 40), false) ;
        return [
            'name' => $name,
            'code' => Str::slug($name),
            'price' => fake()->numberBetween(10, 200) * 1000,
            'product_id' => Product::factory(),
            // 'description' => $desc,
        ];
    }
}
