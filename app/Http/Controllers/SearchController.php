<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Category;

class SearchController extends Controller
{
    public function index()
    {

    }

    public function show()
    {
        try {
            $search = Input::get('search');
            if ($search !== null) {
                $qq = Product::where('name', 'LIKE', '%' . $search . '%')->get();
                $categories = Category::all();

                return view('Products.search', [
                    'qq' => $qq,
                    'categories' => $categories,
                ]);
            }
        }
        catch (\Exception $e){
            return view('Errors.error', [
                'error' => 'Cant find'
            ]);
        }
        return redirect()->back();
    }
}
