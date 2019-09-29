<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController
{
    public function index()
    {
        //$products = Product::all();
        $products = DB::table('products')->paginate(10);
        $categories = Category::all();

        return view('products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('product', [
            'product' => $product
        ]);
    }
    public function update($productId, Request $request)
    {
        /*$post = Post::findOrFail($postId);
        $post->name = $request->input('name', 'Unknown');
        $post->save();
        return response()->json($post);*/
    }

    public function store()
    {
        //return response()->json(['data' => 'post handled']);
    }

    public function destroy($productId, \Request $request)
    {

    }
}
