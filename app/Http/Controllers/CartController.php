<?php

namespace App\Http\Controllers;

use App\Models\carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(){
        return view('pages.users.cart');
    }

    public function store(Request $request)
    {
        # code...
        $user_id = Auth::user()->id;

        $cart = new carts();
        $cart->user_id = $user_id;
        $cart->product_id = $request->product_id;
        $cart->qty = $request->qty_final;
        $cart->status = 'notyet';
        // dd($cart);
        $cart->save();
        return Redirect::to('/cart');
        // return view('pages.users.cart');
    }
}
