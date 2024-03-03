<?php

use App\Models\Product;

beforeEach(function () {
    $this->product = Product::factory()->create();
});

test('test product list api', function () {
    $this->getJson(route('product.index'))->assertJson([
        'data' => [[
            'name' => $this->product->name,
            'price' => $this->product->price,
        ]],
        'links' => [],
        'meta' => [
            'current_page' => 1,
            'from' => 1,
            'last_page' => 1,
            'links' => [],
            'path' => 'http://localhost/api/product',
            'per_page' => 15,
            'to' => 1,
            'total' => 1,
        ],

    ])->assertStatus(200);
});

test('test create a product api', function (array $data) {
    $this->postJson(route('product.create'), $data)->assertJson([
        'data' => $data,
    ])->assertStatus(201);
})->with([
    'normal' => [['name' => 'sansung galaxy', 'price' => 1200]],
]);

test('test create with error', function (array $data, string $message) {
    $this->postJson(route('product.create'), $data)->assertJson([
        'message' => $message,
        'errors' => [],
    ])->assertStatus(422);
})->with([
    'no name' => [['price' => 0], 'message' => 'Name is Mandatory'],
    'no price' => [['name' => 'Nokia phone'], 'message' => 'Price is Mandatory'],
]);

test('test edit product api', function (array $data, int $id, int $status) {
    $this->putJson(route('product.edit', $this->product->id), $data)->assertStatus(200);
})->with([
    'normal' => [['name' => 'sansung galaxy', 'price' => 1200], 'id' => fn () => $this->product->id, 'status' => 200],
    'no name' => [['price' => 1300], 'id' => fn () => $this->product->id, 'status' => 200],
    'no price' => [['name' => 'Motorola Edge'], 'id' => fn () => $this->product->id, 'status' => 200],
    'not found' => [['name' => 'sansung galaxy', 'price' => 1200], 'id' => 999, 'status' => 404],
]);

test('test delete product', function (int $id, int $status) {
    $this->deleteJson(route('product.delete', $id))->assertStatus($status);
})->with([
    'normal' => ['id' => fn () => $this->product->id, 'status' => 200],
    'not found' => ['id' => 999, 'status' => 404],
]);
