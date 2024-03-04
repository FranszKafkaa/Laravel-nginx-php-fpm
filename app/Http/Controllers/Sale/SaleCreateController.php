<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\SaleRequest;
use App\Http\Resources\Sale\SaleResource;

class SaleCreateController extends Controller
{
    public function __invoke(SaleRequest $request)
    {
        return new SaleResource(app('sale')->store($request->products));
    }
}
