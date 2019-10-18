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
        dd('Search Controller');
    }

    public function show()
    {
        $search = Input::get('search');
        if ($search !== null) {
            $qq = Product::where('name', 'LIKE', '%' . $search . '%')->get();
            $categories = Category::all();

            return view('Products.search', [
                'qq' => $qq,
                'categories' => $categories,
            ]);
        }
        return redirect()->back();
    }
}
