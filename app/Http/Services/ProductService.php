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

class ProductService
{
    public function getProductsList()
    {
        
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

    public function updateProduct()
    {

    }

    public function getProduct()
    {
        
    }

    public function deleteProduct()
    {
        
    }
}