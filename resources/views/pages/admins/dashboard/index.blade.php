@extends('layouts.admin')
@section('title', 'Dashboard')
@section('page1', 'Dashboard')
@section('page2', 'Dashboard')

@section('content')
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Registered Users</p>
                <h4 class="mb-0">{{ \App\Models\Users::all()->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">            
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Active Products</p>
                <h4 class="mb-0">{{ \App\Models\Transactions::all()->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">            
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Transactions</p>
                <h4 class="mb-0">{{ \App\Models\Product::all()->count() }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">            
          </div>
        </div>        
      </div>

      <input id="signup-token" name="_token" type="hidden" value="{{csrf_token()}}">
      <div class="row mt-4">
        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">              
              <div class="text-start pt-1">
                <h6 class="mb-0">Transaksi Bulan
                  <select name="bulan" id="bulan">
                    <option value="1" @if (date('m') == 1) selected @endif>Januari</option>
                    <option value="2" @if (date('m') == 2) selected @endif>Februari</option>
                    <option value="3" @if (date('m') == 3) selected @endif>Maret</option>
                    <option value="4" @if (date('m') == 4) selected @endif>April</option>
                    <option value="5" @if (date('m') == 5) selected @endif>Mei</option>
                    <option value="6" @if (date('m') == 6) selected @endif>Juni</option>
                    <option value="7" @if (date('m') == 7) selected @endif>Juli</option>
                    <option value="8" @if (date('m') == 8) selected @endif>Agustus</option>
                    <option value="9" @if (date('m') == 9) selected @endif>September</option>
                    <option value="10" @if (date('m') == 10) selected @endif>Oktober</option>
                    <option value="11" @if (date('m') == 11) selected @endif>November</option>
                    <option value="12" @if (date('m') == 12) selected @endif>Desember</option>
                  </select>
                </h6>
                <br>
                @php
                  setlocale(LC_MONETARY,"id_ID");
                @endphp
                <h4>Jumlah Transaksi: <span><strong id="total">{{$transaksi_tahun->count()}}</strong></span></h4>                              
                <p>Unverified Transaction: <span><strong id="unverified">{{$status['unverified']}}</strong></span></p>
                <p>Expired Transaction: <span><strong id="expired">{{$status['expired']}}</strong></span></p>
                <p>Canceled Transaction: <span><strong id="canceled">{{$status['canceled']}}</strong></span></p>
                <p>Verified Transaction: <span><strong id="verified">{{$status['verified']}}</strong></span></p>
                <p>Delivered Transaction: <span><strong id="delivered">{{$status['delivered']}}</strong></span></p>
                <p>Success Transaction: <span><strong id="success">{{$status['success']}}</strong></span></p>
                <h4>Total Penghasilan <span><strong id="harga">Rp {{number_format($status['harga'],0,',','.')}}</strong></span></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">            
          </div>
        </div>
        @for ($i = 1; $i <= 12; $i++)
          <input type="hidden" id='bulan{{$i}}' value="{{$bulan[$i]}}">
        @endfor

        <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">              
              <div class="text-start pt-1">
                <h6 class="mb-0">Transaksi Tahun
                  <select name="tahun" id="tahun">
                    @for ($i = 2022; $i <= date('Y'); $i++)
                      <option value="{{$i}}" @if ($i == date('Y')) selected @endif>{{$i}}</option>                    
                    @endfor
                  </select>
                </h6>
                <br>                
                <h4>Jumlah Transaksi: <span><strong id="total-tahun">{{$transaksi_tahun->count()}}</strong></span></h4>                              
                <p>Unverified Transaction: <span><strong id="unverified-tahun">{{$status_tahun['unverified']}}</strong></span></p>
                <p>Expired Transaction: <span><strong id="expired-tahun">{{$status_tahun['expired']}}</strong></span></p>
                <p>Canceled Transaction: <span><strong id="canceled-tahun">{{$status_tahun['canceled']}}</strong></span></p>
                <p>Verified Transaction: <span><strong id="verified-tahun">{{$status_tahun['verified']}}</strong></span></p>
                <p>Delivered Transaction: <span><strong id="delivered-tahun">{{$status_tahun['delivered']}}</strong></span></p>
                <p>Success Transaction: <span><strong id="success-tahun">{{$status_tahun['success']}}</strong></span></p>
                <h4>Total Penghasilan <span><strong id="harga-tahun">Rp {{number_format($status_tahun['harga'],0,',','.')}}</strong></span></h4>             
              </div>
            </div>
            <hr class="dark horizontal my-0">            
          </div>
        </div>              
      </div>

      <div class="row mt-4">        
        <div class="col-lg-12 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
              <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
            </div>
            <div class="card-body">
              <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
            </div>
          </div>
        </div>     
    </div>
@endsection