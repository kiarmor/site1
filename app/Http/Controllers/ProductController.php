<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Services\ProductService;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Route;
use Session;
use Symfony\Component\HttpFoundation\Response;


class ProductController
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            $products = $this->productService->getProductsList();
            $categories = Category::all();
            $auth = Auth::user();
        }
        catch (\Exception $e){
            return abort(500);
        }

       return view('products.products', [
            'products' => $products,
            'categories' => $categories,
            'auth' => $auth,
       ]);
    }

    public function store(CreateProductRequest $request)
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

    public function addToCart(Request $request, $productId)
    {
        $product = Product::query()->findOrFail($productId);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();

    }

    public function getCart()
    {
        if (!Session::has('cart')){
            return view('products.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('products.shoppingCart', [
            'products' => $cart->items,
            'totalPrice' => $cart->totalPrice,
        ]);
    }

   /* public function saveCart(Request $request)
    {
        if (!Session::has('cart')){
            return view('products.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $t = $request->get('name');

        dd($t);
    }*/

}
