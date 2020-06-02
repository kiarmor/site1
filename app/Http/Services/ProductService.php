<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 05.10.2019
 * Time: 21:41
 */

namespace App\Http\Services;


use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductService
{
    public function getProductsList()
    {
        $products = DB::table('products')->paginate(10);

        return $products;
    }
    
    public function createProduct(CreateProductRequest $request)
    {
        $product = new Product();
        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');
        if ($request->has('img')){
            dd($request);
           $product->img_path = $request->file('img')->store('/products_img', 'public');
        }
        else  $product->img_path = 'products_img/no_img.jpg';

        $product->save();

        return $product;
    }

    public function updateProduct(UpdateProductRequest $request, int $productId)
    {
        $product = Product::query()->findOrFail($productId);

        $product->name = request('name');
        $product->category_id = request('category_id');
        $product->description = request('description');
        $product->price = request('price');
        $product->img_path = $request->file('img')->store('/products_img', 'public');

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