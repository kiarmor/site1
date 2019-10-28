<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Services\CategoryService;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $categories = $this->categoryService->getCategoryList();
            $auth = Auth::user();
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return view('categories.categories', [

            'categories' => $categories,
            'auth' => $auth,
        ]);
    }

    public function show($categoryId)
    {
        try {
            $products = $this->categoryService->getProductsByCategory($categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return view('categories.category', [

            'products' => $products,
        ]);
    }

    public function update(Request $request, $categoryId)
    {
        try {
            $this->categoryService->updateCategory($request, $categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant update category'
            ]);
        }

        return redirect('/categories');
    }

    public function edit($categoryId, \Request $request)
    {
        try {
            $category = $this->categoryService->getCategory($categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return (view('categories.edit_category', compact('category')));
    }

    public function store(CreateCategoryRequest $request)
    {
        try {
            $this->categoryService->createCategory($request);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return redirect('/categories');
    }

    public function destroy($categoryId, \Request $request)
    {
        try {
            $this->categoryService->deleteCategory($categoryId);
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant connect to DB'
            ]);
        }

        return redirect('/categories');
    }
}
