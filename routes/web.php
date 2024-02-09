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
Route::post('/cart/addToCart', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.addToCart');
Route::post('/cart/{id}/update/plus', [CartController::class, 'update'])->middleware('auth')->name('cart.update.plus');
Route::post('/cart/{id}/update/minus', [CartController::class, 'update'])->middleware('auth')->name('cart.update.minus');

require __DIR__.'/auth.php';
