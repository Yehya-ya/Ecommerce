<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index() : View
    {
        $carts = Cart::with('user')->get();
        return view('pages.cart.index', compact('carts'));

    }
}
