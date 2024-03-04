<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductDeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        return new ProductResource(app('product')->delete($product));
    }
}
