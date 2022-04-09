@extends('layouts.admin')
@section('title', 'Products')
@section('page1', 'Products')
@section('page2', 'Product List')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Product List</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-success mb-0" href="products/create"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Product</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">  
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">No.</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Nama Produk</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Kategori</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Diskon</th>
                                            <th colspan="3" class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Action</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($products as $product)
                                        <tr>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $products->firstItem()+$loop->index }}</p></th>                
                                            <td><p class="text-md font-weight-normal mb-0">{{ $product->product_name }}</p></td>
                                            <td>                                                
                                                @foreach($categories as $category) 
                                                    @if($product->id == $category->product_id)                                                        
                                                        <li>{{ $category->category_name }}</li>                                                                                                                         
                                                    @endif
                                                @endforeach                                                   
                                            </td>
                                            <td>                                                
                                                @foreach($discount as $discounts) 
                                                    @if($product->id == $discounts->id_product)                                                        
                                                        <li>{{ $discounts->percentage }}%</li>                                                                                                                            
                                                    @endif
                                                @endforeach                                                                                                                                         
                                            </td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <a href="products/{{$product->id}}/show" class="m-1 btn bg-gradient-info"><i class="material-icons text-sm me-2">visibility</i>Detail</a>
                                                    <a href="products/{{$product->id}}/edit" class="m-1 btn bg-gradient-warning"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                                                    <a href="/admins/products/{{$product->id}}/delete" class="m-1 btn bg-gradient-danger" onclick="return confirx('Apa yakin ingin menghapus data ini?')"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                                                </div>
                                            </td>                
                                        </tr>
                                        @endforeach      
                                    </tbody>
                                </table>
                            </div>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                            