<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $auth = Auth::user();

        return view('categories.categories', [

            'categories' => $categories,
            'auth' => $auth,
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

        return redirect('/categories');
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

       return redirect('/products');
    }

    public function create(\Request $request)
    {
            $cat = request('category_name');
            if (isset($cat)) {
                $category = Category::firstOrNew(['category_name' => $cat])->save();
                return redirect('/categories');
            }

        return view('Categories.create_category');
    }
}
