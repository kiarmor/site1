<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function show($category_id)
    {
        $category = Category::findOrFail($category_id);
        return view('categories', [
            'categories' => $category
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
