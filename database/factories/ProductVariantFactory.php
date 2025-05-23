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
        return [
            'name' => $name,
            'slug' => Str::replace(' ', '-', Str::lower($name)),
            'price' => fake()->numberBetween(10, 200) * 1_000,
            'product_id' => Product::factory(),
            'status' => 0,
        ];
    }
}
