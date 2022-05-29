@extends('layouts.admin')
@section('title', 'Products')
@section('page1', 'Products')
@section('page2', 'Detail Product')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Detail Product</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-warning mb-0" href="/admins/products/{{$product->id}}/edit"><i class="material-icons text-sm">edit</i>&nbsp;&nbsp;Edit Product</a>
                                </div>
                            </div>
                            <br>                            
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">                                
                                    
                                    <tbody>                                                                                                           
                                        <tr> 
                                            <th class="table-active">Nama Produk</th>
                                            <td>{{ $product->product_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Rating Produk</th>
                                            <td class="table-active">{{ $product->product_rate }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-active">Stok</th>
                                            <td>{{ $product->stock }}</td>
                                        </tr>
                                        <tr>
                                            <th>Berat</th>
                                            <td class="table-active">{{ $product->weight }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-active">Harga</th>
                                            <td >@currency($product->price)</td>
                                        </tr>
                                        <tr>
                                            <th>Deskripsi</th>
                                            <td class="table-active">{{ $product->description }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-active">Kategori</th>
                                            <td>
                                                @foreach($categories as $category)
                                                    <li>{{$category->category_name}}</li>
                                                @endforeach                                            
                                            </td>
                                        </tr>                                        
                                    </tbody>                                
                                </table>
                                @endforeach                                   
                            </div>                                            
                        </div><br><br>
                    
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                        <h2 class="mb-0">Product Images</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-success mb-0" href="/admins/{{$product->id}}/addImage"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Product</a>
                                </div>
                            </div>
                            <br>
                            <div class="row">                                
                                @forelse($image as $images)         
                                    <div class="col-md-1">                                        
                                        <div class="thumbnail">
                                            <img class="img-fluid-left img-thumbnail" src="{{ asset($images->image_name) }}" alt="light" style="width:200px; height:200px;">                                                                
                                        </div>		
                                        <a href="/admins/{{$images->id}}/deleteImage" class="btn bg-gradient-danger" onclick="return confirm('Apa yakin ingin menghapus gambar ini?')">Hapus</a>
                                    </div>		                                                                                     
                                @empty
                                    <h1>Tidak Ada Foto</h1>
                                @endforelse                                
                            </div>
                        </div><br><br>
                                            
                        <div class="table">
                        <div class="row">
                                <div class="col-6 align-items-center">
                                        <h2 class="mb-0">Product Reviews</h2>
                                </div>                                
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">No.</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">User</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Rating</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Review</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Response</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        <tr>
                                            <td></td>
                                            <td>{{$review->name}}</td>
                                            <td>
                                                @php
                                                    if($review->rate == 1){
                                                        echo '<div class="text-primary mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>';
                                                    }elseif($review->rate == 2){
                                                        echo '<div class="text-primary mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>';
                                                    }elseif($review->rate == 3){
                                                        echo '<div class="text-primary mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>';
                                                    }elseif($review->rate == 4){
                                                        echo '<div class="text-primary mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>';
                                                    }elseif($review->rate == 5){
                                                        echo '<div class="text-primary mb-2">
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </div>';
                                                    }
                                                @endphp
                                            </td>
                                            <td>{{$review->content}}</td>
                                            <td>
                                                @php
                                                    $responses = DB::table('response')
                                                    ->where('review_id', $review->id)
                                                    ->get();

                                                    foreach ($responses as $response) {
                                                        echo $response->content;
                                                    }
                                                @endphp
                                            </td>
                                            <td>                                                                                    
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-success lihat-review" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Balas
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Response</h5>
                                                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                        <form action="{{ url('admins/products/'.$review->id.'/responses')}}" method="post">
                                                            @csrf
                                                            @method('post')
                                                            <div class="modal-body">                                                        
                                                                <div class="input-group input-group-dynamic">
                                                                    <textarea name="content" class="form-control" rows="5" placeholder="Say a few words about who you are or what you're working on." spellcheck="false" required></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn bg-gradient-primary">Send Response</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>                                            
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

