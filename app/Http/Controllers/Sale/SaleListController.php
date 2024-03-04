<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Resources\Sale\SaleResource;

class SaleListController extends Controller
{
    public function __invoke()
    {
        return SaleResource::collection(app('sale')->list());
    }
}
