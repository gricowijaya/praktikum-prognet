@extends('layouts.user-layout.app')

@section('content')
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div class="mb-4">
                <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" placeholder="John">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select">
                            <option selected>Indonesia</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control provinsi">
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Kota/ kabupaten</label>
                        <select name="kota" id="kota" class="form-control kota">
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="newaccount">
                            <label class="custom-control-label" for="newaccount">Create an account</label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="shipto">
                            <label class="custom-control-label" for="shipto"  data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="collapse mb-4" id="shipping-address">
                <h4 class="font-weight-semi-bold mb-4">Shipping Address</h4>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" placeholder="John">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" placeholder="example@email.com">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" placeholder="+123 456 789">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select">
                            <option selected>Indonesia</option>
                            <option>Afghanistan</option>
                            <option>Albania</option>
                            <option>Algeria</option>
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Provinsi</label>
                        <select name="provinsi" id="provinsi" class="form-control provinsi">
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Kota/ kabupaten</label>
                        <select name="kota" id="kota" class="form-control kota">
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" type="text" placeholder="123">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                </div>
                <div class="card-body">
                    <h5 class="font-weight-medium mb-3">Products</h5>
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
                    <div class="d-flex justify-content-between">
                        <p>{{$product_name}}</p>
                        <p>{{$sub_price}}</p>
                    </div>                        
                    @endforeach
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Sub Total</h5>
                        <h5 class="font-weight-bold">{{$sub_total}}</h5>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Ongkir</h5>
                        <h5 class="font-weight-bold ongkir"></h5>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Total</h5>
                        <h5 class="font-weight-bold totval">{{$sub_total}}</h5>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Payment</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                            <label class="custom-control-label" for="directcheck">Direct Check</label>
                        </div>
                    </div>
                    <div class="">
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                            <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" id="submit">Place Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- form input --}}
    <div class="modal" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload Pembayaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('checkout')}}" method="post" id="formSubmit" class="d-none">
                @csrf
                @method('post')
                <input type="text" name="address" id="address">
                <input type="text" name="regency" id="regency">
                <input type="text" name="province" id="province">
                <input type="text" name="total" id="total" value="{{$sub_total}}">
                <input type="text" name="shipping_cost" id="shipping_cost">
                <input type="text" name="sub_total" id="sub_total" value="{{$sub_total}}">
                <input type="file" name="proof_of_payment" id="proof_of_payment">
            </form>
            <h5>Produk</h5>
            <hr>
            @foreach ($carts as $item)
            @php
                $product_name = $item->product->product_name;
                $price = $item->product->price;
                $qty = $item->qty;
                $sub_price = $price * $qty;
            @endphp
            <div class="d-flex justify-content-between">
                <p>{{$product_name}}</p>
                <p>{{$sub_price}}</p>
            </div>                        
            @endforeach

            <div class="d-flex justify-content-between">
                <p class="font-weight-bold">Sub Total</p>
                <span>{{$sub_total}}</span>
            </div>
            <div class="d-flex justify-content-between">
                <p class="font-weight-bold">Ongkir</p>
                <span class="ongkir"></span>
            </div>
            <div class="d-flex justify-content-between">
                <p class="font-weight-bold">Total</p>
                <span class="totval"></span>
            </div>
            <button class="btn btn-primary" id="upload">Upload Bukti Pembayaran</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="submitBtn">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script>
    $(document).ready(function(){
        $('.kota').prepend("<option selected>--Pilih Kota--</option>");
        $('.provinsi').prepend("<option selected>--Pilih Provinsi--</option>")
        $.ajax({
            url: "{{ url('provinsi')}}",
            method: "GET",
            success: function(data){
                $.each(data, function(index, item){
                    $('.provinsi').append($('<option>', {
                        value: item.province_id,
                        text: item.province
                    }));
                });
            }
        })

        $('#provinsi').change(function(){
            $('.kota').empty();
            $('.kota').prepend("<option selected>--Pilih Kota--</option>");
            var id = $('#provinsi').val();
            var url = "{{ url(':id/kota')}}";
            url = url.replace(":id", id);
            $.ajax({
            url: url,
            method: "GET",
            success: function(data){
                $.each(data, function(index, item){
                    $('.kota').append($('<option>', {
                        value: item.city_id,
                        text: item.city_name
                    }));
                });
            }
            })
        })

        $('#kota').change(function(){
            var cost = $('#sub_total').val();
            var id = $('#kota').val();
            var url = "{{ url(':id/cost')}}";
            url = url.replace(":id", id);
            $.ajax({
            url: url,
            method: "GET",
            success: function(data){
                cost = parseInt(cost) + data[0].costs[0].cost[0].value;
                $('#total').val(cost);
                $('#shipping_cost').val(data[0].costs[0].cost[0].value);
                $('.ongkir').html(data[0].costs[0].cost[0].value);
                $('.totval').html(cost);
            }   
            })
        })

        $('#upload').click(function(){
            $('#proof_of_payment').click();
        })

        $('#submit').click(function(){
            var province = $('#provinsi option:selected').text();
            var regency = $('#kota option:selected').text();
            var address = regency + ", " + province;
            $('#province').val(province);
            $('#regency').val(regency);
            $('#address').val(address);
            $('#modal').modal('show');
        })

        $('#submitBtn').click(function(){
            $('#formSubmit').submit();
        });
    });
</script>
@endsection
