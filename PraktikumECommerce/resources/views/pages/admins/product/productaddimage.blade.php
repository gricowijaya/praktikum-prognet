@extends('layouts.admin')
@section('title', 'Products')
@section('page1', 'Products')
@section('page2', 'Add Product Images')

@section('content')   
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="/admins/{{ $products->id }}/addImage" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h2>Add Image</h2>
                                <br>
                                <label>Pilih Foto :</label>
                                <div class="col-mb-4">
                                    <div class="input-group input-group-outline my-3">                                    
                                        <input type="file" class="form-control" placeholder="" name="files[]" multiple>
                                    </div>                                                                                  
                                </div>        
                                <br>          
                                <div>
                                    <button class="btn btn-primary" type="submit">
                                        Submit
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