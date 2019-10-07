<?php
/**
 * Created by PhpStorm.
 * User: Security
 * Date: 07.10.2019
 * Time: 11:45
 */

namespace App\Http\Services;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryService
{
    public function getCategoryList()
    {
        $categories = Category::all();

        return $categories;
    }

    public function createCategory (Request $request)
    {
        $category = new Category();
        $category->name = request('name');
        $category->save();

        return $category;

    }

    public function updateCategory(Request $request, int $categoryId)
    {
        $category = Category::query()->findOrFail($categoryId);
        $category->category_name = request('category_name');
        $category->save();

    }

    public function getCategory(int $categoryId)
    {
       $products = Product::all()->where('category_id', $categoryId);

       return $products;
    }

    public function deleteCategory(int $categoryId)
    {
        Category::query()->findOrFail($categoryId)->delete();
    }
}