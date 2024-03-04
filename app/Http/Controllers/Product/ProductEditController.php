<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductEditRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductEditController extends Controller
{
    public function __invoke(ProductEditRequest $request, Product $product)
    {
        return new ProductResource(app('product')->update($product, $request));
    }
}
