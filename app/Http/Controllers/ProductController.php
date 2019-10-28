<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Services\ProductService;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;
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
            return view('Errors.error', [
                'error' => 'DB connection fail.'
            ]);
        }

       return view('products.products', [
            'products' => $products,
            'categories' => $categories,
            'auth' => $auth,
       ]);
    }

    public function store(CreateProductRequest $request)
    {
        try{
        $categories = Category::all();
        $this->productService->createProduct($request);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Can not create product'
            ]);
        }

        return redirect('/products');

    }


    public function show($productId)
    {
        try{
       $product = $this->productService->getProduct($productId);
       $auth = Auth::user();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'DB connection fail.'
            ]);
        }

        return view('products.product', [
            'product' => $product,
            'auth' => $auth,
        ]);
    }

    public function update($productId, Request $request)
    {
        try{
        $product = $this->productService->updateProduct($request, $productId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant update product'
            ]);
        }

        return redirect('/products');

    }

    public function destroy($productId, \Request $request)
    {
        try{
       $this->productService->deleteProduct($productId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant delete product'
            ]);
        }

       return redirect('/products');

    }

    public function edit($productId, \Request $request)
    {
        try{
        $product = $this->productService->getProduct($productId);
        $categories = Category::all();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant edit product'
            ]);
        }


        return view('products.edit_products',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function addToCart(Request $request, $productId)
    {
        try{
        $product = Product::query()->findOrFail($productId);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Add to cart Fail.'
            ]);
        }

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

    public function saveCart(Request $request)
    {
        if (!Session::has('cart')){
            return view('products.shoppingCart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $order = new Order();

        try {
            $order->user_name = $request->input('user_name');
            $order->phone_number = $request->input('phone_number');
            $order->address = $request->input('address');
            $order->cart = json_encode($cart);
            $order->save();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Please try later'
            ]);
        }

        Session::forget('cart');

        return view('welcome', [
            'message' => 'Success'
        ]);
    }
}
