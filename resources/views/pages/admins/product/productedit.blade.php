@extends('layouts.admin')
@section('title', 'Products')
@section('page1', 'Products')
@section('page2', 'Edit Product')

@section('content')   
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="/admins/products/{{$products->id}}/update" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">  
                                <h2>Edit Product</h2>
                                <br><br>
                                <div class="col-mb-4">
                                    <div class="input-group input-group-static @error('product_name') is-invalid @enderror mb-4">
                                        <label>Nama Produk :</label>
                                        <input type="text" class="form-control" placeholder="Nama Produk" name="product_name" autofocus value="{{ $products->product_name }}">    
                                    </div>                                                      
                                </div>                                                                                
                                <div class="col-mb-4">
                                    <div class="input-group input-group-static @error('price') is-invalid @enderror my-3">                                    
                                        <label>Harga Satuan :</label>
                                        <input type="text" class="form-control" placeholder="Harga Satuan" name="price" value="{{ $products->price }}">
                                    </div>
                                </div>                                    
                                <div class="col-mb-4">
                                    <div class="input-group input-group-static @error('stock') is-invalid @enderror my-3">                                    
                                        <label>Stok :</label>
                                        <input type="text" class="form-control" placeholder="Stok" name="stock" value="{{ $products->stock }}">
                                    </div>
                                </div>                              
                                <div class="col-mb-4">
                                    <div class="input-group input-group-static @error('weight') is-invalid @enderror my-3">                                    
                                        <label>Berat Produk :</label>
                                        <input type="text" class="form-control" placeholder="Berat Produk" name="weight" value="{{ $products->weight }}">
                                    </div>
                                </div>                                 
                                <div class="input-group input-group-static mb-4">
                                    <label for="" class="ms-0">Kategori :</label>
                                    <select class="form-control" name="category_id[]">
                                        @foreach($category as $categories)
                                            <option
                                                @foreach ($categoryDetail as $dataDetail)
                                                    @if ($dataDetail->category_id==$categories->id) selected="selected"
                                                    @endif
                                                @endforeach
                                                value="{{$categories->id}}">{{$categories->category_name}}
                                            </option>
                                        @endforeach
                                    </select>                                    
                                </div>
                                <label class="ms-0"for="">Deskripsi :</label>                                
                                <div class="input-group input-group-dynamic">                                    
                                    <textarea class="form-control" rows="5" placeholder="Deskripsi" name="description">{{$products->description}}</textarea>
                                </div> 
                                <br>
                                <div class="col-mb-4">
                                    <div class="input-group input-group-static @error('percentage') is-invalid @enderror my-3">                                    
                                        <label>Persentase Diskon :</label>
                                        <input type="text" class="form-control" placeholder="Persentase" name="percentage">
                                    </div>
                                </div>
                                <div class="input-group input-group-static @error('start') is-invalid @enderror my-3">
                                    <label>Start :</label>
                                    <input type="date" class="form-control" name="start">
                                </div>  
                                <div class="input-group input-group-static @error('end') is-invalid @enderror my-3">
                                    <label>End :</label>
                                    <input type="date" class="form-control" name="end">
                                </div>                                                                                      
                                @if (count($errors) > 0)                                    
                                    @foreach ($errors->all() as $error)     
                                        <p class="text-danger">{{$error}}</p>
                                    @endforeach                                   
                                @endif
                                <br>                                                        
                                <div>
                                    <button class="btn btn-primary" type="submit">
                                        Edit Product
                                    </button>                                                                  
                                </div>                          
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection