<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeUnauthController extends Controller
{
    public function index(){
        
        $categories = ProductCategories::with('product')->get();
        
        $products = Product::with('product_images','product_category_details','product_categories')->get();
        
        return view('home',['product' => $products, 'product_categories' => $categories]);
    }

    public function show($id){
        $product = Product::with('product_images','product_category_details','product_categories')
            ->where('id','=',$id)->first();
        $reviews = DB::table('product_reviews')->join('users', 'users.id', '=', 'product_reviews.user_id')
        ->select('product_reviews.*', 'users.name')->where('product_reviews.product_id', '=',$id)
        ->orderby('product_reviews.id', 'desc')->get();
        return view('pages.users.product', ['product' => $product, 'reviews' => $reviews]); 
    }
}
