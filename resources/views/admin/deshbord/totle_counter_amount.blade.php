@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
            <div class="card-header"> <a class="btn btn-info" href="{{ url('home') }}">{{ __('Back') }}</a> </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                         <th>No:</th>
                         <th>Counter</th>
                         <th>Totle Taka</th>

                      </tr>
                  </thead>
                    <tbody>



          @foreach ($sub_counters as  $value)
              <tr>

              <td> {{ $value->id }}</td>
              <td> {{ $value->sub_counter }}</td>
              {{-- <td> {{ App\Sub_counter::find($value->from_station)->sub_counter}}</td>
              <td> {{ $value->to_station}}</td>
              <td> {{ $value->bus_name}}</td> --}}

              {{-- <td> <a class="btn btn-info" href="{{ url('counter_bus_totle_amount') }}/{{ $value->id }}">Totle Amount</a></td> --}}

              <td> <button type="button"  value="{{ $value->id }}" class="btn btn-info sub_counter_id" data-toggle="modal" data-target="#deatils">Totle Amount</button></td>

              </tr>
          @endforeach



                    </tfoot>
                  </table>

            </div>
        </div>
          </div>
        <div class="col-lg-6">


          <div class="card" style="padding:10px">
          <div class="alert alert-primary">

             <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">
               <h4 class="card-text">All Counter Tickets Have Been Sold : {{ count($PurchaseTicketget_payment_status) }}</h4>

             </div>

             <br>
             @php
               $start=1;
             @endphp
             @foreach ($PurchaseTicketget_payment_status as $key => $value)
               <p>{{ $start++ }} .{{ $value->ticket_date  }}--->{{ App\Counter::find(App\Sub_counter::find($value->from_station)->counter_id)->counter}}, {{ App\Sub_counter::find($value->from_station)->sub_counter }} , {{ $value->ticket_quentity }} Ticket, Totle {{ $value->ticket_quentity*$value->class_price }} Taka</p>

             @endforeach
                  <hr>

           </div>
             </div>
      </div>

    </div>

  </div>

  <div class="modal fade" id="deatils" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#e0006c;">
        <h4 class="modal-title" style="color:#fff;">Totle Amount</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="modal-body-photo text-center card" style="color:#e0006c;padding:10px; margin-bottom:20px;" id="amount">



        </div>
        </div>
      </div>

@endsection

@section('javascript_content')
<script type="text/javascript" class="init">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
  $('.sub_counter_id').click(function(){
var sub_counter_id = $(this).val();



$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
           type:'POST',
           url:'/counter_amount',
           data: {sub_counter_id:sub_counter_id},
           success:function (data){
             $('#amount').html(data);

           }
    });
  });




    </script>
@endsection
