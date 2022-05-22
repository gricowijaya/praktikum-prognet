@extends('layouts.admin')
@section('title', 'Categories')
@section('page1', 'Categories')
@section('page2', 'Category List')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">                 
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Category List</h2>
                                </div>
                                <div class="col-6 text-end align-items-center">
                                    <a class="btn bg-gradient-success mb-0" href="categories/create"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Category</a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">No.</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Nama Kategori</th>
                                            <th colspan="2" class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Action</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $categories->firstItem()+$loop->index }}</p></th>                
                                            <td><p class="text-md font-weight-normal mb-0">{{ $category->category_name }}</p></td>
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <a href="categories/{{$category->id}}/edit" class="m-1 btn bg-gradient-warning"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                                                    <a href="/admins/categories/{{$category->id}}/delete" class="m-1 btn bg-gradient-danger" onclick="return confirx('Apa yakin ingin menghapus data ini?')"><i class="material-icons text-sm me-2">delete</i>Delete</a>
                                                </div>
                                            </td>                
                                        </tr>
                                        @endforeach      
                                    </tbody>
                                </table>
                            </div>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

