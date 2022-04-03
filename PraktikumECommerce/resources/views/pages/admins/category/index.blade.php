@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <h2>List Categories</h2>
                            <br>
                            <button type="button" class="btn bg-gradient-success">
                                <a href="categories/create">Add Category</a>
                            </button>                            
                            <table class="table align-items-center">
                                <thead>
                                    <tr class="text-left">
                                        <th>No.</th>
                                        <th>Nama Kategory</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)                                    
                                    <tr class="">
                                        <th>{{ $categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td style="align: center;">
                                            <a href="categories/{{$category->id}}/edit" class="btn bg-gradient-warning">Edit</a>
                                            <a href="/admins/categories/{{$category->id}}/delete" class="btn bg-gradient-danger" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection