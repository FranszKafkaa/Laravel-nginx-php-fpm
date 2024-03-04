<?php

use App\Http\Controllers\Product\ProductCreateController;
use App\Http\Controllers\Product\ProductDeleteController;
use App\Http\Controllers\Product\ProductEditController;
use App\Http\Controllers\Product\ProductListController;
use App\Http\Controllers\Sale\SaleCreateController;
use App\Http\Controllers\Sale\SaleDeleteController;
use App\Http\Controllers\Sale\SaleEditController;
use App\Http\Controllers\Sale\SaleListController;
use App\Http\Controllers\Sale\SaleShowController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::name('sale.')->prefix('sale')->group(function () {
    Route::get('/', SaleListController::class)->name('index');
    Route::post('/create', SaleCreateController::class)->name('create');
    Route::get('/{sale}', SaleShowController::class)->name('show');
    Route::put('/edit/{sale}', SaleEditController::class)->name('edit');
    Route::delete('/delete/{sale}', SaleDeleteController::class)->name('delete');
});

Route::name('product.')->prefix('product')->group(function () {
    Route::get('/', ProductListController::class)->name('index');
    Route::post('/create', ProductCreateController::class)->name('create');
    Route::put('/edit/{product}', ProductEditController::class)->name('edit');
    Route::delete('/delete/{product}', ProductDeleteController::class)->name('delete');
});
