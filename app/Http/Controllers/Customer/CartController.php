<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function show(Cart $cart): View
    {
        if (auth()->user()->cart != $cart) {
            abort(403);
        }

        return view('pages.cart.show', compact('cart'));
    }

    public function update(Request $request, Cart $cart): RedirectResponse
    {
        if (auth()->user()->cart != $cart) {
            abort(403);
        }

        $product_id = $request->validate([
            'product_id' => ['required', 'integer'],
        ])['product_id'];

        $product = Product::find($product_id);

        if (! $product) {
            abort(404);
        }

        $quantity = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', "max:$product->stock"],
        ])['quantity'];

        $cart_product = $cart->products()->Where('cart_id', $cart->id)->Where('product_id', $product->id)->first();
        if (! $cart_product) {
            $cart->products()->attach($product_id, ['quantity' => $quantity, 'unit_price' => $product->value, 'cid' => $product->cid]);
        } else {
            $cart_product->sale->quantity = $quantity;
            $cart_product->sale->unit_price = $product->value;
            $cart_product->sale->cid = $product->cid;
            $cart_product->sale->save();
        }

        return redirect(route('home'));
    }

    public function pay(Cart $cart): RedirectResponse
    {
        if (auth()->user()->cart != $cart) {
            abort(403);
        }

        if (! $cart->pay()) {
            redirect(route('home'))->withErrors('There was an error with the payement, try to make new order.');
        }

        return redirect(route('home'))->with('success', 'Your payment has been compeleted successfully. Thank you for your payment.');
    }

    public function cancel(Cart $cart): RedirectResponse
    {
        if (auth()->user()->cart != $cart) {
            abort(403);
        }

        $cart->cancel();

        return redirect(route('home'))->with('success', 'Your Cart has been canceled.');
    }
}
