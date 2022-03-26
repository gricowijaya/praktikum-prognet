@extends('layouts.admin')

@section('content')   
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="/admins/products/update/{{$products->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h2>Add Product</h2>
                                <br>
                                <label for="">Nama Produk :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Nama Produk" name="product_name" value="{{$products->product_name}}">
                                </div>
                                <label for="">Harga Satuan :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Harga Satuan" name="price" value="{{$products->price}}">
                                </div>
                                <label for="">Stok :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Stok" name="stock" value="{{$products->stock}}">
                                </div>
                                <label for="">Berat Produk :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" placeholder="Berat Produk" name="weight" value="{{$products->weight}}">
                                </div>
                                <label for="">Kategori :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <select name="category_id[]">
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
                                <label for="">Deskripsi :</label>
                                <div class="mb-3">
                                    <textarea name="description" id="" cols="50" rows="5">{{$products->description}}</textarea>                                                    
                                </div>
                                <label for="">Pilih Foto :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="file" class="form-control" placeholder="" name="files[]">
                                </div>
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