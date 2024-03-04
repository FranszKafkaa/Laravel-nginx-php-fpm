<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;
use App\Models\Sale;

class SaleShowController extends Controller
{
    public function __invoke(Sale $sale)
    {
        return new SaleResource($sale);
    }
}
