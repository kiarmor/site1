<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.categories', [
            'categories' => $categories,
        ]);
    }

    public function show($category_id)
    {
        $products = Product::all()->where('category_id', $category_id);

        return view('categories.category', [
            'products' => $products,
        ]);
    }

    public function update($categoryId, Request $request)
    {

    }

    public function store()
    {

    }

    public function destroy($categoryId, \Request $request)
    {

    }
}
