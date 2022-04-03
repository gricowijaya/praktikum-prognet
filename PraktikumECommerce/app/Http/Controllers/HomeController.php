<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     // return view('pages.users.dashboard.index');
    //     return view('auth.login');
    // }
    public function index(){
        $categories = ProductCategories::with('product')->get();
        
        $products = Product::with('product_images','product_category_details','product_categories')->get();
        
        return view('home',['product' => $products, 'product_categories' => $categories]);
    }

    public function show($id){
        $product = Product::with('product_images','product_category_details','product_categories')
            ->where('id','=',$id)->first();
        return view('pages.users.product', ['product' => $product]); 
    }
}
