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
        $category = Category::findOrFail($categoryId);


        $category->category_name = request('category_name');
        $category->save();

        return redirect('/admin/edit_products');
    }

    public function edit($categoryId, \Request $request)
    {
        $category = Category::findOrFail($categoryId);

        return (view('categories.edit_category', compact('category')));
    }

    public function store()
    {

    }

    public function destroy($categoryId, \Request $request)
    {
       Category::findOrFail($categoryId)->delete();

       return redirect('/admin/edit_products');
    }

    public function create()
    {
        dd('Create category');
    }

}
