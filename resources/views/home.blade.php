@extends('layouts.user-layout.app')
@section('title', 'Home')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Welcome to Our Shop</h1>            
        </div>
    </div>
    <!-- Page Header End -->

    <div class="container-fluid pt-5">
        
            

            <!-- Shop Product Start -->
            
                <div class="row px-xl-5 pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search by name">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-transparent text-primary">
                                            <i class="fa fa-search text-shopee"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <div class="dropdown ml-4">
                                <button class="btn border dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                            Sort by
                                        </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                    <a class="dropdown-item" href="#">Latest</a>
                                    <a class="dropdown-item" href="#">Popularity</a>
                                    <a class="dropdown-item" href="#">Best Rating</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($product as $products)
                    <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                    @foreach($products->product_images as $image)
                                        <img class="img-fluid w-100" src="{{ asset($image->image_name) }}" alt="" style="width:300px; height:300px;">
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
                                    <a href="/product/{{$products->id}}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-shopee mr-1"></i>View Detail</a>
                                    @if (is_null(Auth::user()))
                                        <a href="/login" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-shopee mr-1"></i>Add To Cart</a>
                                    @else
                                        <a href="/cart" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-shopee mr-1"></i>Add To Cart</a>
                                    @endif
                                </div>
                            </div>
                        </div>            
                    @endforeach                    
                    <div class="col-12 pb-1">
                        <nav aria-label="Page navigation">
                          <ul class="pagination justify-content-center mb-3">
                            <li class="page-item disabled">
                              <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                              </a>
                            </li>
                            <li class="page-item active"><a class="page-link bg-shopee" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                              <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                              </a>
                            </li>
                          </ul>
                        </nav>
                    </div>
                </div>
            
            <!-- Shop Product End -->
        
    </div>
               





   
    
@endsection
