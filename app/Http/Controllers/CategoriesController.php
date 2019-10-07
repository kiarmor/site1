<?php

namespace App\Http\Controllers;

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
        $products = $this->categoryService->getCategory($categoryId);

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
        $category = Category::findOrFail($categoryId);

        return (view('categories.edit_category', compact('category')));
    }

    public function store()
    {

    }

    public function destroy($categoryId, \Request $request)
    {
        $this->categoryService->deleteCategory($categoryId);

        return redirect('/products');
    }

    public function create(Request $request)
    {
            $cat = request('category_name');
            if (isset($cat)) {
                $category = Category::firstOrNew(['category_name' => $cat])->save();
                return redirect('/categories');
            }

        return view('Categories.create_category');
    }
}
