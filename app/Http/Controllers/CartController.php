<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function show()
    {

        $cart_products = Cart::where('user_id', auth()->user()->id)->orderBy('updated_at')->get();
        $cart_total = $this->total($cart_products);
        $cart_discount = $this->discount($cart_total, $cart_products);
        $cart_discountPercent = $cart_discount[0];

        if ($cart_discountPercent > 0) {
            $cart_discountTotal = $cart_discount[1];
            return view('cart', compact(
                'cart_products',
                'cart_total',
                'cart_discountPercent',
                'cart_discountTotal'
            ));
        }

        return view('cart', compact('cart_products', 'cart_total'));
    }

    public function addToCart(Request $request)
    {
        Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'quantity' => 1,
        ]);
        return back()->with('success', 'Предмет добавлен в корзину');
    }

    public function updatePlus($id)
    {
        $product = Cart::findOrFail($id);
        $product->update([
            'quantity' => $product->quantity + 1,
        ]);
        return back()->with('success', 'Предмет добавлен в корзину');
    }

    public function updateMinus($id)
    {
        $product = Cart::findOrFail($id);
        if ($product->quantity <= 1) {
            $product->delete();
        }
        $product->update([
            'quantity' => $product->quantity - 1,
        ]);

        return back()->with('success', 'Предмет убран из корзины');
    }

    private function total($cart_products)
    {
        $cart_total = 0;
        foreach ($cart_products as $key => $cart_product) {
            $cart_total += $cart_product->quantity * $cart_product->product->price;
        }
        return $cart_total;
    }

    private function discount($cart_total, $cart_products)
    {
        $cart_discountSum = 0;
        foreach ($cart_products as $key => $cart_product) {
            if ($cart_product->product->discount) {
                $cart_discountSum += $cart_product->quantity * $cart_product->product->price;
            }
        }
        if ($cart_discountSum == 0) {
            return [0, $cart_total];
        } else if (Auth::user()->bonuses > $cart_discountSum) {
            return [1, $cart_total - $cart_discountSum];
        }
        $cart_discountPercent = Auth::user()->bonuses / $cart_discountSum;

        $cart_discountTotal = $cart_total - $cart_discountSum * $cart_discountPercent;
        return [$cart_discountPercent, $cart_discountTotal];
    }
}
