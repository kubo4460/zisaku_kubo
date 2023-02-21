<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $like_model = new Like();
        $products = Product::all();
        
        return view('home', compact('products','like_model'));
    }
}
