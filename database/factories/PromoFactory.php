<?php

namespace Database\Factories;

use DateInterval;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->country();

        $useProduct = rand(0, 30) % 3;
        $selected = null;
        switch ($useProduct) {
            case 1:
                // $promoableType = Category::class;
                // $allIds = Category::pluck('id')->toArray();
                // $promoableId = fake()->randomElement($allIds);
                // break;
            case 2:
                $promoableType = ProductVariant::class;
                $allIds = ProductVariant::pluck('id')->toArray();
                $promoableId = fake()->randomElement($allIds);
                $selected = (0 + ProductVariant::where('id', '=', $promoableId)->get()->first()->price) / 2_000;
                break;
            default:
                $promoableType = Product::class;
                $allIds = Product::pluck('id')->toArray();
                $promoableId = fake()->randomElement($allIds);
                break;
        }

        $temp1 = fake()->dateTimeBetween('-40 weeks', '10 weeks');
        $temp2 = fake()->dateTimeBetween('-10 weeks', '40 weeks');
        if ($temp1 > $temp2) {
            $expiredAt = $temp1;
            $appliesTo = $temp2;
        } else {
            $expiredAt = $temp2;
            $appliesTo = $temp1;
        }

        $discount = fake()->randomFloat(0, 4, 60);
        $nominal = fake()->numberBetween(4, $selected ?? 30);
        $nominalMax = fake()->numberBetween($nominal, $nominal * 1.2);
        $minPurchase = fake()->numberBetween($nominal * 0.8, $nominal * 4);

        return [
            'name' => $name,
            'code' => Str::slug($name),
            'description' => fake()->realText(rand(16, 128)),
            'discount' => $discount <= $nominal ? $discount : 0,
            'nominal' => ($discount > $nominal ? $nominal : 0) * 500,
            'nominal_max' => ($discount <= $nominal ? $nominalMax : 0) * 500,
            'min_purchase' => $minPurchase * 1_000,
            'promoable_id' => $promoableId,
            'promoable_type' => $promoableType,
            'applies_to' => $appliesTo,
            'expired_at' => $expiredAt,
        ];
    }
}
