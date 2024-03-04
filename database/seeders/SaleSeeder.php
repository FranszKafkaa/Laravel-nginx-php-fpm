<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sale = new Sale();
        $product = Product::find(1);

        $sale->amount = $product->price;
        $sale->save();

        $sale->Products()->attach($product->id, ['amount' => 1]);
    }
}
