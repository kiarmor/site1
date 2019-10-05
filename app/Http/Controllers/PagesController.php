<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home()
    {
        $tasks = [
            'Go to gym',
            'Go to store',
            'Go to sleep'
        ];
        $auth = Auth::user();

        return view('welcome', [
            'auth' => $auth,
            'tasks' => $tasks,
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

    public function showForm()
    {
        //TODO: remove  create_products.blade and do all in products/create
        $categories = Category::all();
        return view('products.create_products', [
            'categories' => $categories,
            ]);
    }
}
