<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Services\ProductService;

class ProductListController extends Controller
{
    public function __invoke()
    {
        return ProductResource::collection((new ProductService())->list());
    }
}
