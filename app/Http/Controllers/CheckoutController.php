<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\carts;
use App\Models\Transactions;
use App\Models\Admins;
use App\Models\Admin_Notification;
use App\Notifications\ReviewNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $carts =  carts::with('product', 'user')->where('user_id', '=', $user_id)->where('status', '=', "checkedout")->get();
        return view('pages.users.checkout', ['carts' => $carts]);
    }

    public function province()
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "key: 51855085bf1c0a7ed70943e8ea51bec6"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
          $result = json_decode($response, true);
          return $result['rajaongkir']['results'];
    }

    public function city($id)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id."",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "key: 51855085bf1c0a7ed70943e8ea51bec6"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
          $result = json_decode($response, true);
          return $result['rajaongkir']['results'];       
    }

    public function cost($id)
    {
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=501&destination=".$id."&weight=1000&courier=jne",
            CURLOPT_HTTPHEADER => array(
              "key: 51855085bf1c0a7ed70943e8ea51bec6"
            ),
          ));
          
          $response = curl_exec($curl);
          $err = curl_error($curl);
          
          curl_close($curl);
          
          $result = json_decode($response, true);
          return $result['rajaongkir']['results'];       
    }

    public function create(Request $request)
    {
        $admin = Admins::all();
        $now = Carbon::now();
        $timeout = $now->addHours(24);

        $user_id = auth()->id();

        $data = array_merge($request->all(), array('timeout' => $timeout,
        'user_id' => auth()->id(), 'courier_id' => 1, 'status' => 'unverified'));

        Transactions::create($data);

        //status
        carts::with('product', 'user')->where('user_id', '=', auth()->id())
        ->update(['status' => 'cancelled']);

        // Notification::send($admin, new ReviewNotification($user_id));

        Admin_Notification::create([
            'type' => "notifikasi",
            'notifiable_type' => "notifikasi_pesanan_customer",
            'notifiable_id' => 1 ,
            'data' => "Silahkan Cek Pesanan dari Customer",
        ]);

        return Redirect::to('/transactions/unverified');
    }
}