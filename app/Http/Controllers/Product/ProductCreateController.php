<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Services\ProductService;

class ProductCreateController extends Controller
{
    public function __invoke(ProductRequest $request)
    {
        return new ProductResource((new ProductService())->store($request));
    }
}
