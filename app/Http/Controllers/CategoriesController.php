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
        $categories = $this->categoryService->getCategoryList();
        $auth = Auth::user();

        return view('categories.categories', [

            'categories' => $categories,
            'auth' => $auth,
        ]);
    }

    public function show($categoryId)
    {
        $products = $this->categoryService->getProductsByCategory($categoryId);

        return view('categories.category', [

            'products' => $products,
        ]);
    }

    public function update(Request $request, $categoryId)
    {
        $this->categoryService->updateCategory($request, $categoryId);

        return redirect('/categories');
    }

    public function edit($categoryId, \Request $request)
    {
        $category = $this->categoryService->getCategory($categoryId);

        return (view('categories.edit_category', compact('category')));
    }

    public function store(CreateCategoryRequest $request)
    {
        $this->categoryService->createCategory($request);

        return redirect('/categories');
    }

    public function destroy($categoryId, \Request $request)
    {
        $this->categoryService->deleteCategory($categoryId);

        return redirect('/categories');
    }
}
