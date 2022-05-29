@extends('layouts.user-layout.app')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Welcome to Our Shop</h1>            
        </div>
    </div>

    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-12">
                <div class="row pb-3">
                    
                    @foreach ($product as $products)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    @foreach($products->product_images as $image)
                                        <img class="" src="{{asset($image->image_name)}}" alt="" style="width:300px; height:300px;:">
                                        @break
                                    @endforeach
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3">{{$products->product_name}}</h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>@currency($products->price)</h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border">
                                    <a href="/product/{{$products->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                    @if (is_null(Auth::user()))
                                        <a href="/login" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    @else
                                        <a href="/cart" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    @endif
                                </div>
                            </div>
                        </div>            
                    @endforeach                    
                    
                </div>
            </div>

                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                    @foreach ($user_notifications  as $user_notification)
                        @if ($user_notification->notifiable_type == 'notifikasi_balasan_produk')
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                <strong class="me-auto">Notifikasi User</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                    <div class="toast-body">
                                        {{$user_notification->data}}
                                    </div>
                            </div>
                        @endif
                        @if ($user_notification->notifiable_type == 'notifikasi_user')
                            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                <div class="toast-header">
                                <strong class="me-auto">Notifikasi User</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                    <div class="toast-body">
                                        {{$user_notification->data}}
                                    </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            <!-- Shop Product End -->
            </div>
            <!-- Shop Sidebar End -->

        </div>
    </div>
@endsection
