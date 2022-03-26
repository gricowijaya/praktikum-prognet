@extends('layouts.admin')

@section('content')   
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="form-signin" action="discounts/update/{{$discount_info->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h2>Edit Discount</h2>
                                <br>
                                <label for="">Percentage :</label>
                                <div class="input-group input-group-outline my-3">                                    
                                    <input type="text" class="form-control" name="percentage" value="{{ $discount_info->percentage }}">
                                </div>
                                <label for="">Start :</label>
                                <div class=form-group>
                                    <input type="date" name="start" value="{{ $discount_info->start }}">
                                </div>
                                <label for="">End :</label>
                                <div class=form-group>
                                    <input type="date" name="end" value="{{ $discount_info->end }}">
                                </div>
                                <br>
                                <div>
                                    <button class="btn btn-primary" type="submit">
                                        Edit Discount
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