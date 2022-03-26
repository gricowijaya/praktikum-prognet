<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Discount;
use App\Models\Product;

class HomeUnauthController extends Controller
{
    public function home(){
        $categories = ProductCategories::with('product')->get();
        
        $products = Product::with('product_images','product_category_details','product_categories')->get();
        
        return view('home',['product' => $products, 'product_categories' => $categories]);
    }
}
