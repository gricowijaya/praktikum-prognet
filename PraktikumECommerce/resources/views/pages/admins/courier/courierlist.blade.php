@extends('layouts.admin')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <h2>List Couriers</h2>
                            <br>
                            <button type="button" class="btn bg-gradient-success">
                                <a href="couriers/create">Add Courier</a>
                            </button>                            
                            <table class="table align-items-center">
                                <thead>
                                    <tr class="text-left">
                                        <th>No.</th>
                                        <th>Nama Kurir</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($couriers as $courier)                                    
                                    <tr class="">
                                        <td>{{ $couriers->firstItem()+$loop->index }}</td>
                                        <td>{{ $courier->courier }}</td>
                                        <td style="align: center;">
                                            <a href="couriers/{{$courier->id}}/edit" class="btn bg-gradient-warning">Edit</a>
                                            <a href="/admins/couriers/{{$courier->id}}/delete" class="btn bg-gradient-danger" onclick="return confirm('Apa yakin ingin menghapus data ini?')">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                            {{ $couriers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection