<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductEditRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductEditController extends Controller
{
    public function __invoke(ProductEditRequest $request, Product $id)
    {
        return new ProductResource((new ProductService())->update($id, $request));
    }
}
