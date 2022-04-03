@extends('layouts.admin')

@section('content')   
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="/admins/products/store" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h2>Add Product</h2>
                                <br>
                                <label for="">Nama Produk :</label>
                                <div class="input-group input-group-outline @error('product_name') is-invalid @enderror my-3">                                     
                                    <input type="text" class="form-control" placeholder="Nama Produk" name="product_name" value="{{ old('product_name') }}">
                                </div>
                                <label for="">Harga Satuan :</label>
                                <div class="input-group input-group-outline @error('price') is-invalid @enderror my-3">                                    
                                    <input type="text" class="form-control" placeholder="Harga Satuan" name="price" value="{{ old('price') }}">
                                </div>
                                <label for="">Stok :</label>
                                <div class="input-group input-group-outline @error('stock') is-invalid @enderror my-3">                                    
                                    <input type="text" class="form-control" placeholder="Stok" name="stock" value="{{ old('stock') }}">
                                </div>
                                <label for="">Berat Produk :</label>
                                <div class="input-group input-group-outline @error('weight') is-invalid @enderror my-3">                                    
                                    <input type="text" class="form-control" placeholder="Berat Produk" name="weight" value="{{ old('weight') }}">
                                </div>
                                <label for="">Kategori :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <select name="category_id[]">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>                                
                                <label for="">Deskripsi :</label>
                                <div class="mb-3 @error('description') is-invalid @enderror">
                                    <textarea name="description" id="" cols="50" rows="5">{{ old('description') }}</textarea>                                                    
                                </div>
                                <label for="">Pilih Foto :</label>
                                <div class="input-group input-group-outline @error('files[]') is-invalid @enderror my-3">                                    
                                    <input type="file" class="form-control" placeholder="" name="files[]">
                                </div>
                                @if (count($errors) > 0)                                    
                                    @foreach ($errors->all() as $error)     
                                        <p class="text-danger">{{$error}}</p>
                                    @endforeach                                   
                                @endif
                                
                                <div>
                                    <button class="btn btn-primary" type="submit">
                                        Add Product
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