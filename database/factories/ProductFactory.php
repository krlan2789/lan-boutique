<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
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
        $name = fake()->unique()->city();

        $size = fake()->randomElement([
            ['XS/S', 'M/L', 'XL/2XL'],
            [],
            ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL'],
            [],
            ['36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46'],
            [],
            ['27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38'],
        ]);

        return [
            'name' => $name,
            'code' => Str::slug($name),
            'colors' => $colors,
            'size' => $size,
            // 'description' => fake()->sentence(rand(20, 40), false),
        ];
    }
}
