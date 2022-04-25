@extends('layouts.user-layout.app')

@section('content')    
<div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th></th>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <form action="{{ route('updatecart') }}" id="updatecarts" method="post">
                            @csrf
                            {{ method_field('post') }}
                            @php
                                $sub_total = 0;
                            @endphp
                        @foreach ($carts as $item)
                        @php
                            $cart_id = $item->id;
                            $product_name = $item->product->product_name;
                            $price = $item->product->price;
                            $qty = $item->qty;
                            $sub_price = $price * $qty;
                            $sub_total += $sub_price;
                        @endphp
                        {{-- {{dd($item->product)}}  --}}
                        <tr>
                            <td>
                                <input type="checkbox" name="<?= $cart_id ?>" id="<?= $cart_id ?>">
                            </td>
                            <td class="align-middle">
                                <img src="img/product-1.jpg" alt="" style="width: 50px;">
                                {{ $product_name}} </td>
                            <td class="align-middle">@currency($price)</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    {{-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus">
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div> --}}
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{$qty}}">
                                    {{-- <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div> --}}
                                </div>
                            </td>
                            <td class="align-middle">@currency($sub_price)</td>
                            <td class="align-middle"><a href="{{ route('deletecart', $cart_id)}}" class="btn btn-sm btn-primary"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach
                    </form>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">@currency($sub_total)</h6>
                        </div>
                        {{-- <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div> --}}
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">@currency($sub_total)</h5>
                        </div>
                        <button type="submit" form="updatecarts" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
