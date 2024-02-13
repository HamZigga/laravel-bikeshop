<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        if (!Auth::guest()) {
            return view('index', [
                'products' => Product::orderBy('id')->paginate(12),
                'cart_products' => Cart::where('user_id', auth()->user()->id)->orderBy('updated_at')->get()
            ]);
        }
        return view('index', ['products' => Product::orderBy('id')->paginate(12)]);
    }
}
