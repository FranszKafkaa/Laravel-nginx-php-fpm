<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\SaleRequest;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Sale;

class SaleEditController extends Controller
{
    public function __invoke(SaleRequest $data, Sale $sale)
    {
        return new SaleResource(app('sale')->update($data->products, $sale));
    }
}
