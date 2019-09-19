<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController /*extends Controller*/
{
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products]);
    }

    public function show($productId)
    {
        /*$post = Post::findOrFail($postId);
        return response()->json($post);*/
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
