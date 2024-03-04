<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Pagination\LengthAwarePaginator;

class SaleService
{
    public function list(): LengthAwarePaginator
    {
        return Sale::where('status', \App\Enum\Sale::APROVED)->paginate();
    }

    public function store(array $data): Sale
    {
        $sale = new Sale();
        $sale->amount = self::amountCount($data);

        $sale->save();
        $sale->attachProducts($data);

        return $sale;
    }

    public function update(array $data, Sale $sale): Sale
    {
        $sale->attachProducts($data);
        $sale->amount = self::amountCount($data, $sale);
        $sale->update();

        return $sale;
    }

    public function delete(Sale $sale): Sale {
        $sale->status = \App\Enum\Sale::CANCELLED;
        $sale->update();

        return $sale;
    }

    private static function amountCount(array $data, ?Sale $sale = null): float
    {
        $amount = 0;

        if ($sale) {
            foreach ($sale->Products as $product) {
                $amount += $product->price * $product->pivot->amount;
            }
        } else {
            foreach ($data as $item) {
                $amount += Product::find($item['id'])->price * $item['amount'];
            }
        }

        return $amount;
    }
}
