<?php

use App\Models\Product;

beforeEach(function () {
    $this->product = Product::factory()->create();
});

test('model save product', function () {
    expect($this->product->id)->toBe($this->product->id);
});

test('model update test', function () {
    $newName = 'teste produto';

    $this->product->name = $newName;
    expect($this->product->name)->toBe($newName);
});

test('model delete test', function () {
    $this->product->delete();
    expect(Product::find($this->product->id))->toBe(null);
});
