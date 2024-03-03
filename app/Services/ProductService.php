<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    public function list(): LengthAwarePaginator
    {
        return Product::paginate();
    }

    public function store(FormRequest $product): Product
    {
        $ProductDAO = new Product($product->all());
        $ProductDAO->save();

        return $ProductDAO;
    }

    public function update(Product $product, FormRequest $request): Product
    {
        $product->update($request->all());

        return $product;
    }

    public function delete(Product $product): Product
    {
        $product->delete();

        return $product;
    }
}
