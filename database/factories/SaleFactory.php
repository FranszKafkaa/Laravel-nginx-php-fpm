<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Sale $sale) {
            $products = Product::factory()->count(2)->create();
            $amount = 0;
            foreach ($products as $product) {
                $amount += round($product->price * 2, 2);
            }

            $products->each(function ($product) use ($sale) {
                $sale->Products()->attach($product->id, ['amount' => 2]);
            });

            $sale->update(['amount' => $amount]);

        });
    }
}
