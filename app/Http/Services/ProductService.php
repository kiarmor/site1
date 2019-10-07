<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 05.10.2019
 * Time: 21:41
 */

namespace App\Http\Services;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getProductsList()
    {
        $products = DB::table('products')->paginate(10);

        return $products;
    }
    
    public function createProduct(Request $request)
    {
        $product = new Product();
        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');
        $product->save();

        return $product;
    }

    public function updateProduct(Request $request, int $productId)
    {
        $product = Product::query()->findOrFail($productId);

        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');
        $product->save();

        return $product;

    }

    public function getProduct(int $productId)
    {
        $product = Product::query()->findOrFail($productId);

        return $product;
    }

    public function deleteProduct(int $productId)
    {
        Product::query()->findOrFail($productId)->delete();
    }
}