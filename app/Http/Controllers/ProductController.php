<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController
{
    public function index()
    {
        $products = DB::table('products')->paginate(10);
        $categories = Category::all();
        $auth = Auth::user();

        return view('products.products', [
            'products' => $products,
            'categories' => $categories,
            'auth' => $auth,
        ]);
    }

    public function store()
    {

    }

    public function create()
    {
        dd('Create product');
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        $auth = Auth::user();
        return view('products.product', [
            'product' => $product,
            'auth' => $auth,
        ]);
    }

    public function update($productId, Request $request)
    {
        $product = Product::findOrFail($productId);

        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');

        $product->save();

        return redirect('/admin/edit_products');

    }

    public function destroy($productId, \Request $request)
    {
        Product::findOrFail($productId)->delete();

        return redirect('/products');

    }

    public function edit($productId, \Request $request)
    {
        $product = Product::findOrFail($productId);

        return (view('edit', compact('product')));
    }

}
