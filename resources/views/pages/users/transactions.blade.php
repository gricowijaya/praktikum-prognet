@extends('layouts.user-layout.app')

@section('content')
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="card-title">Riwayat Transaksi</div>
              </div>
              <div class="row">
                <div class="btn-group ml-4" role="group">
                  <a href="{{ url('transactions/unverified')}}" class="btn btn-primary @if($status == 'unverified') active @endif">Unverified</a>
                  <a href="{{ url('transactions/verified')}}" class="btn btn-primary @if($status == 'verified') active @endif">Verified</a>
                  <a href="{{ url('transactions/delivered')}}" class="btn btn-primary @if($status == 'delivered') active @endif">Delivered</a>
                  <a href="{{ url('transactions/canceled')}}" class="btn btn-primary @if($status == 'canceled') active @endif">Canceled</a>
                  <a href="{{ url('transactions/expired')}}" class="btn btn-primary @if($status == 'expired') active @endif">Expired</a>
                  <a href="{{ url('transactions/success')}}" class="btn btn-primary @if($status == 'success') active @endif">Success</a>
                </div>
              </div>
              @foreach ($transactions as $transaction)
              <div class="row mt-4 mx-4">
                <div class="col-5">
                  <input type="hidden" name="timeout" id="timeout" value="{{$transaction->timeout}}">
                  <input type="hidden" name="id" id="id" value="{{$transaction->id}}">
                  @if ($transaction->status == 'unverified')
                    <div class="row">
                      <div class="col">
                        <span id="time">{{$transaction->timeout}}</span>
                      </div>
                    </div>

                    <script>
                      var id = $('#id').val();
                      var time = $('#timeout').val();
                      var countDownDate = new Date(time).getTime();
                      var x = setInterval(function() {
                          // Get today's date and time
                          var now = new Date().getTime();
                            
                          // Find the distance between now and the count down date
                          var distance = countDownDate - now;
                            
                          // Time calculations for days, hours, minutes and seconds
                          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                            
                          // Output the result in an element with id="demo"
                          document.getElementById("time").innerHTML = hours + "h "
                          + minutes + "m " + seconds + "s ";
                            
                          // If the count down is over, write some text 
                          if (distance < 0) {
                            clearInterval(x);
                            expired();
                          }
                      }, 1000);

                      function expired(){
                        $('#status').val('expired');
                        $('#update').submit();
                      }
                    </script>
                  @endif
                  <hr>
                  <div class="row">
                    <div class="col">
                      <h5 class="font-weight-bold">Address</h5>
                    </div>
                    <div class="col">
                      {{$transaction->address}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <h5 class="font-weight-bold">Sub Total</h5>
                    </div>
                    <div class="col">
                      {{$transaction->sub_total}}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <h5 class="font-weight-bold">Shipping Cost</h5>
                    </div>
                    <div class="col">
                      {{$transaction->shipping_cost}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <h5 class="font-weight-bold">Total</h5>
                    </div>
                    <div class="col">
                      {{$transaction->total}}
                    </div>
                  </div>
                  @if ($transaction->status == 'delivered')
                    <div class="row mb-4">
                      <div class="col">
                        <button class="btn btn-sm btn-primary" id="done">Done</button>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
              <form action="{{ url('transactions/'.$transaction->id.'/update')}}" method="POST" id="update" class="d-none">
                @csrf
                @method('post')
                <input type="text" name="status" id="status"/>
              </form>
              @endforeach
            </div>
          </div>
        </div>
    </div>

    <script>
      $('#done').click(function(){
        $('#status').val('success');
        $('#update').submit();
      });
    </script>
@endsection
