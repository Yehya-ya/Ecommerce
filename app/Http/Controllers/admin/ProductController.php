<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::with('categories')->get();
        return view('pages.admin.product.index', compact('products'));
    }

    public function create() : View
    {
        $categories = Category::all();
        return view('pages.admin.product.create', compact('categories'));
    }

    public function store(Request $request) : RedirectResponse
    {
        $attr = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'min:0', 'integer'],
            'stock' => ['required', 'min:0', 'integer'],
        ]);

        $categories = Category::whereIn('id', array_values($request->input('categories')))->get();

        $product = Product::create($attr);

        $product->categories()->attach($categories);

        return redirect(route('admin.product.index'));
    }

    public function edit(Product $product) : View
    {
        $categories = Category::all();
        return view('pages.admin.product.edit', compact(['product', 'categories']));
    }

    public function update(Request $request, Product $product) : RedirectResponse
    {
        $attr = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'min:0', 'integer'],
            'stock' => ['required', 'min:0', 'integer'],
        ]);
        if ($request->input('categories')) {
            $categories = Category::whereIn('id', array_values($request->input('categories')))->get();
            $product->categories()->sync($categories);
        }

        $product->update($attr);

        return redirect(route('admin.product.index'));
    }
}
