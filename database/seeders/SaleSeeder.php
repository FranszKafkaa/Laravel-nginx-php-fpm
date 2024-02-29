<?php

namespace Database\Seeders;

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
        $sale->status = \App\Enum\Sale::APROVED;
        $sale->save();

        $sale->Products()->attach(1);
    }
}
