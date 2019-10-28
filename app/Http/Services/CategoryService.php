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
        try {
            $categories = Category::all();

            return $categories;
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }
    }

    public function getCategory(int $categoryId)
    {
        try{
            $category = Category::query()->findOrFail($categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return $category;
    }

    public function createCategory (CreateCategoryRequest $request)
    {
        try{
            $category = new Category();
            $category->category_name = request('category_name');
            $category->save();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return $category;
    }

    public function updateCategory(Request $request, int $categoryId)
    {
        try {
            $category = Category::query()->findOrFail($categoryId);
            $category->category_name = request('category_name');
            $category->save();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }
    }

    public function getProductsByCategory(int $categoryId)
    {
        try {
            $products = Product::all()->where('category_id', $categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

       return $products;
    }

    public function deleteCategory(int $categoryId)
    {
        try {
            Category::query()->findOrFail($categoryId)->delete();
        }
        catch (\Exception $e) {

            return view('Errors.error', [
                'error' => 'Cant delete category'
            ]);
        }
    }
}