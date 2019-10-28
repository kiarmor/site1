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
        try{
            $content = Content::findOrFail(1);
            $auth = Auth::user();
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'Some DB connection fail'
            ]);
        }

        return view('welcome', [
            'auth' => $auth,
            'content' => $content,
        ]);
    }

    public function news()
    {
        try {
            return view('news');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

    public function about()
    {
        try {
            return view('about');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

    public function contact()
    {
        try {
            return view('contact');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

    public function admin()
    {
        try {
            return view('Admin.admin');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

    public function index()
    {
        try {
            $products = DB::table('products')->paginate(10);
            $categories = Category::all();
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'Some DB connection fail'
            ]);
        }

        return view('products.edit_products', [
            'products' => $products,
            'categories' => $categories,
        ]);

    }

    public function createProductForm()
    {
        try {
            $categories = Category::all();
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'Some DB connection fail'
            ]);
        }
        return view('products.create_products', [
            'categories' => $categories,
            ]);
    }

    public function createCategoryForm()
    {
        try {
            return view('categories.create_category');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

    public function buy_form()
    {
        try {
            return view('products.buy_form');
        }
        catch (\Exception $e){
            return view('errors.error', [
                'error' => 'File not found'
            ]);
        }
    }

}
