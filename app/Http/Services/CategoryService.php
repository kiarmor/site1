<?php
/**
 * Created by PhpStorm.
 * User: Security
 * Date: 07.10.2019
 * Time: 11:45
 */

namespace App\Http\Services;


use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Exceptions;
use Illuminate\Http\Request;

class CategoryService
{
    public function getCategoryList()
    {
        $categories = Category::all();

        return $categories;
    }

    public function getCategory(int $categoryId)
    {
        $category = Category::query()->findOrFail($categoryId);

        return $category;
    }

    public function createCategory (CreateCategoryRequest $request)
    {
        $category = new Category();
        $category->category_name = request('category_name');
        $category->save();

        return $category;
    }

    public function updateCategory(Request $request, int $categoryId)
    {
        $category = Category::query()->findOrFail($categoryId);
        $category->category_name = request('category_name');
        $category->save();
    }

    public function getProductsByCategory(int $categoryId)
    {
        $products = Product::all()->where('category_id', $categoryId);

        return $products;
    }

    public function deleteCategory(int $categoryId)
    {
        Category::query()->findOrFail($categoryId)->delete();
    }
}