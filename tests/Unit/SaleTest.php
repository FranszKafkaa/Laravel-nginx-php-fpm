<?php

use App\Models\Product;
use App\Models\Sale;

beforeEach(function () {
    $this->sale = Sale::factory()->create();
});

test('model save sale', function () {
    expect($this->sale->id)->toBe($this->sale->id);
});

test('model instance Product por Sale', function () {
    expect($this->sale->Products[0])->toBeInstanceOf(Product::class);
});

test('attach um novo produto no Sale', function () {
    $product = Product::factory()->create();
    $this->sale->Products()->attach($product, ['amount' => 2]);
    expect($this->sale->Products->last()['name'])->toBe($product->name);
});

test('cancelar uma venda', function () {
    $this->sale->status = \App\Enum\Sale::CANCELLED;
    expect($this->sale->status)->toBe(\App\Enum\Sale::CANCELLED);
});
