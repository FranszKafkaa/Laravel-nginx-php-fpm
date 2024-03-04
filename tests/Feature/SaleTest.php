<?php

use App\Models\Product;
use App\Models\Sale;

beforeEach(function () {
    $this->sale = Sale::factory()->create();
});

test('list sales', function () {
    $this->getJson(route('sale.index'))->assertJson([
        'data' => [[
            'sale_id' => $this->sale->id,
            'amount' => round($this->sale->amount, 2),
            'status' => $this->sale->status->name,

        ]],
        'links' => [],
        'meta' => [
            'current_page' => 1,
            'from' => 1,
            'last_page' => 1,
            'links' => [],
            'path' => 'http://localhost/api/sale',
            'per_page' => 15,
            'to' => 1,
            'total' => 1,
        ],

    ])->assertStatus(200);
});

test('mostrar uma sale', function () {
    $this->getJson(route('sale.show', $this->sale->id))->assertJson([
        'data' => [
            'sale_id' => $this->sale->id,
            'amount' => round($this->sale->amount, 2),
            'status' => $this->sale->status->name,
            'products' => [
                [
                    'name' => $this->sale->Products->first()->name,
                    'price' => $this->sale->Products->first()->price,
                    'amount' => $this->sale->Products->first()->pivot->amount,
                ],
            ],
        ],
    ])->assertStatus(200);
});

test('cancelar uma sale', function () {
    $this->deleteJson(route('sale.delete', $this->sale->id))->assertJson(
        [
            'data' => [
                'sale_id' => $this->sale->id,
                'status' => \App\Enum\Sale::CANCELLED->name,
                'amount' => round($this->sale->amount, 2),
                'products' => [
                    [
                        'name' => $this->sale->Products->first()->name,
                        'price' => $this->sale->Products->first()->price,
                        'amount' => $this->sale->Products->first()->pivot->amount,
                    ],
                ],
            ],
        ]
    );
});

test('criar uma sale', function () {
    $product = Product::factory()->create();
    $amount = 2;
    $this->postJson(route('sale.create'), [
        'products' => [
            [
                'id' => $product->id,
                'amount' => $amount,
            ],
        ]])->assertJson([
            'data' => [
                'products' => [
                    [
                        'name' => $product->name,
                        'price' => $product->price,
                        'amount' => $amount,
                    ],
                ],
            ],
        ]);
});

test('criar uma sale com erros', function (array $data, string $message) {
    $this->postJson(route('sale.create'), $data)->assertJson([
        'message' => $message,
        'errors' => [],
    ])->assertStatus(422);
})->with([
    'id não existente' => [['products' => [['id' => 999, 'amount' => 2]]], 'message' => 'o id não existe na base de dados'],
    'sem products' => [[], 'message' => 'products é obrigatório'],
    'sem id' => [['products' => [['amount' => 2]]], 'message' => 'id é obrigatório'],
]);

test('edit uma sale', function () {

    $product = Product::factory()->create();
    $amount = 2;
    $this->putJson(route('sale.edit', $this->sale->id), [
        'products' => [
            [
                'id' => $product->id,
                'amount' => $amount,
            ],
        ],
    ])->assertJson([
        'data' => [
            'sale_id' => $this->sale->id,
            'status' => $this->sale->status->name,
            'amount' => round(Sale::find($this->sale->id)->amount, 2),
            'products' => [
                [
                    'product_id' => $this->sale->Products[0]->id,
                    'name' => $this->sale->Products[0]->name,
                    'price' => $this->sale->Products[0]->price,
                    'amount' => $this->sale->Products[0]->pivot->amount,
                ],
            ],
        ],
    ]);

    expect($this->sale->Products->last()->name)->toBe($product->name);
});
