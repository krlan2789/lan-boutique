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
        $count = rand(0, 6);
        for ($a = 0; $a < $count; $a++) {
            $c = fake()->safeHexColor();
            if (!$colors->contains($c)) $colors->add($c);
            else $a--;
        }
        $name = fake()->unique()->city();
        return [
            'name' => $name,
            'code' => Str::slug($name),
            'colors' => $colors,
        ];
    }
}
