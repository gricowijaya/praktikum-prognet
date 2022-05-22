@extends('layouts.admin')
@section('title', 'Transactions')
@section('page1', 'Transactions')
@section('page2', 'Transactions List')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="table">
                            <div class="row">
                                <div class="col-6 align-items-center">
                                    <h2 class="mb-0">Transactions List</h2>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">  
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">No.</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">User</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Courier</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Shipping</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Sub-Total</th>
                                            <th class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Total</th>
                                            <th colspan="3" class="text-uppercase text-secondary text-lg font-weight-bolder ps-2">Action</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $transaction)
                                        <tr>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transactions->firstItem()+$loop->index }}</p></th>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transaction->user->name }}</p></td>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transaction->couriers->courier }}</p></td>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transaction->shipping_cost }}</p></td>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transaction->sub_total }}</p></td>
                                            <td><p class="text-md font-weight-normal mb-0">{{ $transaction->total }}</p></td>
                                            {{-- <td></td> --}}
                                            <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                  <form action="{{ url('admins/transactions/'.$transaction->id.'/update')}}" method="POST">
                                                    @csrf
                                                    @method('post')
                                                    @php
                                                      if($transaction->status == 'unverified'){
                                                        echo '<button type="submit" value="verified" name="status" class="m-1 btn bg-gradient-info">Verifikasi</button>';
                                                        echo '<button type="submit" value="canceled" name="status" class="m-1 btn bg-gradient-danger">Cancel</button>';
                                                      }elseif($transaction->status == 'delivered'){
                                                        echo 'Delivered';
                                                      }elseif($transaction->status == 'canceled'){
                                                        echo 'Canceled';
                                                      }elseif($transaction->status == 'success'){
                                                        echo 'Success';
                                                      }elseif($transaction->status == 'expired'){
                                                        echo 'Expired';
                                                      }
                                                    @endphp
                                                  </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach      
                                    </tbody>
                                </table>
                            </div>
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection