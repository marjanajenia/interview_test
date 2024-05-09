<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user= Post::where('user_id', Auth::user()->id)->first();
        return view('home');
    }

    public function category()
    {
        $categories = Category::with('products')->paginate(1);
        return view('category', compact('categories'));
    }
    public function products()
    {
        // $feature = Feature::with('products')->get();
        // dd($feature);
        $products = Product::with('category', 'feature')->paginate(1);
        return view('products', compact('products'));
    }

}
