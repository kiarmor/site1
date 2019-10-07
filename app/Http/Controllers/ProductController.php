<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
       $products = $this->productService->getProductsList();
       $categories = Category::all();
       $auth = Auth::user();

       return view('products.products', [
            'products' => $products,
            'categories' => $categories,
            'auth' => $auth,
       ]);
    }

    public function store(Request $request)
    {
        $categories = Category::all();
        $this->productService->createProduct($request);

        return redirect('/products');

    }


    public function show($productId)
    {
       $product = $this->productService->getProduct($productId);
       $auth = Auth::user();

        return view('products.product', [
            'product' => $product,
            'auth' => $auth,
        ]);
    }

    public function update($productId, Request $request)
    {
        $product = $this->productService->updateProduct($request, $productId);

        return redirect('/products');

    }

    public function destroy($productId, \Request $request)
    {
       $this->productService->deleteProduct($productId);

       return redirect('/products');

    }

    public function edit($productId, \Request $request)
    {
        $product = $this->productService->getProduct($productId);
        $categories = Category::all();


        return view('products.edit_products',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

}
