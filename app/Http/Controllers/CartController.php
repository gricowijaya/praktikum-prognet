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

    public function index()
    {
        // dd(Auth::user());
        $user_id = Auth::user()->id;
        $carts =  carts::with('product', 'user')->where('user_id', '=', $user_id)->where('status', '=', "notyet")->get();
        // dd($carts);
        return view('pages.users.cart', ['carts' => $carts]);
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
        $cart->save();
        // $cart = carts::updateOrCreate(
        //     ['user_id' => $user_id, 'product_id' => $request->product_id, 'status' => 'notyet'],
        //     ['qty' => $request->qty_final],
        // );
        return Redirect::to('/cart');
    }

    public function update(Request $request)
    {
        // dd($request);
        $list_id = [];
        foreach ($request->request as $key => $value) {
            if ($key == "_token" || $key == "_method") {
                continue;
            }
            array_push($list_id, $key);
        }
        foreach ($list_id as $key) {
            $cart = carts::find($key);
            $cart->status = "checkedout";
            $cart->save();
        }
        return Redirect::to('/checkout');
    }

    public function destroy(Request $request)
    {
        # code...
    }
}
