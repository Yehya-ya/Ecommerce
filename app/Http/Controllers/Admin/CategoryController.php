<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withCount('products')->get();

        return view('pages.admin.category.index', compact('categories'));
    }

    public function create(): View
    {
        return view('pages.admin.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $attr = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $attr['slug'] = Category::slug($attr['title']);
        Category::create($attr);

        return redirect(route('admin.category.index'));
    }

    public function edit(Category $category): View
    {
        return view('pages.admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $attr = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
        ]);

        $attr['slug'] = Category::slug($attr['title'], $category->id);
        $category->update($attr);

        return redirect(route('admin.category.index'));
    }
}
