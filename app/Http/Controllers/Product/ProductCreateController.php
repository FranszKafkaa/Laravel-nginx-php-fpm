<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;

class ProductCreateController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        return new ProductResource(app('product')->store($request));
    }
}
