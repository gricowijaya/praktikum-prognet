@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <h2>List Products</h2>
                            <br>
                            <button type="button" class="btn bg-gradient-success">
                                <a href="products/create">Add Product</a>
                            </button>
                            <!-- <button type="button" class="btn bg-gradient-danger">
                                <a href="">Trash</a>
                            </button> -->
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Discount</th>
                                        <th colspan="3">Action</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)                                                                       
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                            @foreach($categories as $category)
                                                @if($product->id == $category->product_id)
                                                <li>{{ $category->category_name }}</li>
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a
                                                @foreach($discount as $discounts)
                                                    @if($product->id == $discounts->id_product)
                                                    @endif
                                                @endforeach
                                                class="btn-sm btn-danger"
                                                href="discounts/{{$product->id}}">Diskon
                                            </a>
                                        </td>
                                        <td style="align: center;">
                                            <a href="products/show/{{$product->id}}" class="btn bg-gradient-info">Detail</a>
                                            <a href="products/edit/{{$product->id}}" class="btn bg-gradient-warning">Edit</a>
                                            <a href="/admins/products/delete/{{$product->id}}" class="btn bg-gradient-danger" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</a>
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
@endsection