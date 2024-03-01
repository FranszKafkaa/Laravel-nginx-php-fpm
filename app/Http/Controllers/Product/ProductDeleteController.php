<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use App\Services\ProductService;

class ProductDeleteController extends Controller
{
    public function __invoke(Product $id)
    {
        return new ProductResource((new ProductService())->delete($id));
    }
}
