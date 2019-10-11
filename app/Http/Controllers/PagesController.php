<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{

    public function home()
    {
        $content = Content::findOrFail(1);
        $auth = Auth::user();

        return view('welcome', [
            'auth' => $auth,
            'content' => $content,
        ]);
    }

    public function news()
    {
        return view('news');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');

    }

    public function admin()
    {
        return view('Admin.admin');
    }

    public function index()
    {
        $products = DB::table('products')->paginate(10);
        $categories = Category::all();

        return view('products.edit_products', [
            'products' => $products,
            'categories' => $categories,
        ]);

    }

    public function createProductForm()
    {
        //TODO: remove  create_products.blade and do all in products/create
        $categories = Category::all();
        return view('products.create_products', [
            'categories' => $categories,
            ]);
    }

    public function createCategoryForm()
    {
        return view('categories.create_category');
    }


}
