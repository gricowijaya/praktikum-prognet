<?php

namespace App\Http\Controllers;

use App\Models\Admin_Notification;
use Illuminate\Http\Request;
use App\Models\ProductCategories;
use App\Models\Discount;
use App\Models\Product;
use App\Models\ProductReviews;
use App\Models\UserNotifications;
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

        $user_notifications = UserNotifications::all();

        // dd($user_notifications);
        
        return view('home',['product' => $products, 'product_categories' => $categories, 'user_notifications' => $user_notifications ]);
    }

    public function show($id){
        $product = Product::with('product_images','product_category_details','product_categories')
            ->where('id','=',$id)->first();
        return view('pages.users.product', ['product' => $product]); 
    }

    public function review(Request $request, $product_id)
    {
        ProductReviews::create([
            'product_id' => $product_id,
            'user_id' => auth()->id(),
            'rate' => $request->rate,
            'content' => $request->content
        ]);


        Admin_Notification::create([
            'type' => "notifikasi",
            'notifiable_type' => "notifikasi_review",
            'notifiable_id' => 1,
            'data' => "Produk anda telah direview !",
        ]);

        return back();
    }
}
