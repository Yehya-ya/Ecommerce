<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('stock', '>', 0)->get();

        return view('pages.home', compact(['products']));
    }
}
