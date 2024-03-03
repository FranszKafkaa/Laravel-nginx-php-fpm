<?php

use App\Http\Controllers\Product\ProductCreateController;
use App\Http\Controllers\Product\ProductDeleteController;
use App\Http\Controllers\Product\ProductEditController;
use App\Http\Controllers\Product\ProductListController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::name('sales.')->prefix('sales')->group(function () {

});

Route::name('product.')->prefix('product')->group(function () {
    Route::get('/', ProductListController::class)->name('index');
    Route::post('/create', ProductCreateController::class)->name('create');
    Route::put('/edit/{id}', ProductEditController::class)->name('edit');
    Route::delete('/delete/{id}', ProductDeleteController::class)->name('delete');
});
