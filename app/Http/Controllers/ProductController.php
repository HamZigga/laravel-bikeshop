<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the products
     *
     * @return View
     */
    public function index()
    {
        if (!Auth::guest()) {
            return view('index', [
                'products' => Product::OrderByIdPaginated(),
                'cart_products' => Cart::authUser()->orderBy('updated_at')->get()
            ]);
        }
        return view('index', ['products' => Product::OrderByIdPaginated()]);
    }
}
