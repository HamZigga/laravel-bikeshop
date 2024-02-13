<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('/cart', [CartController::class, 'show'])->middleware('auth')->name('cart');


Route::middleware('auth')->group(function () {
    Route::prefix('cart')->group(function () {
        Route::name('cart.')->group(function () {
            Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
            Route::post('/{id}/update/plus', [CartController::class, 'updatePlus'])->name('update.plus');
            Route::post('/{id}/update/minus', [CartController::class, 'updateMinus'])->name('update.minus');
        });
    });
});

require __DIR__ . '/auth.php';
