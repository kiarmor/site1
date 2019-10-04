<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    public function index()
    {
        dd('Search Controller');
   }

    public function show()
    {
        $search = Input::get('search');
        $qq = Product::where('name','LIKE','%'.$search.'%')->get();

        return view('Products.search', compact('qq'));
    }
}
