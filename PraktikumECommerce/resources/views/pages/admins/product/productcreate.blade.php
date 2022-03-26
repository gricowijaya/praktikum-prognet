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
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Nama Produk" name="product_name">
                                </div>
                                <label for="">Harga Satuan :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Harga Satuan" name="price">
                                </div>
                                <label for="">Stok :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Stok" name="stock">
                                </div>
                                <label for="">Berat Produk :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Berat Produk" name="weight">
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
                                <div class="mb-3">
                                    <textarea name="description" id="" cols="50" rows="5"></textarea>                                                    
                                </div>
                                <label for="">Pilih Foto :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="file" class="form-control" placeholder="" name="files[]">
                                </div>
                                <br>
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