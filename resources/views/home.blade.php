@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card" style="padding:10px">
          <div class="alert alert-primary text-center" style="height:250px">


            <div class="bd-info" style=" background-color: #e0006c; padding:10px;color:#fff">
              <h3>Active Admin : {{ App\User::find(Auth::id())->name }}</h3>

             </div>
<br>
               <p>Admin : {{ $admin }}</p>
               <p>Totle User : {{ $totle_customer }}</p>
               <p>User Block: {{ $totle_block }}</p>
               <a href="{{ url('all_user')}} " class="badge" style="background-color:#e0006c; color:#fff">View All User  -></a>

          </div>


      </div>
          </div>
          <div class="col-lg-4">
              <div class="card" style="padding:10px">
              <div class="alert alert-primary text-center" style="height:250px">
                       <div class="bd-info" style=" background-color: #e0006c; padding:10px;color:#fff">
                         <h3>Bus Terminal : {{ $Counter }}</h3>

                       </div>
                         <br>
                       @foreach ($Counterget as $key => $value)
                         @foreach ($value->totle_sub_counter as $sub_counter_names)
                          @php
                            session(['allow_counter'=>$sub_counter_names->allow_counter_status])
                          @endphp

                         @endforeach

                         @if (session('allow_counter')==1)
                             <a href="{{ 'view/all_counter' }}/{{ $value->id }}" style="color:#fff" type="text" class="badge bg-primary">{{ $value->counter }}</a>
                          @else
                           <a href="{{ 'view/all_counter' }}/{{ $value->id }}" style="color:#fff" type="text" class="badge bg-danger">{{ $value->counter }}</a>
                         @endif
                       @endforeach


                    </div>

               </div>
          </div>
          <div class="col-lg-4">
            <div class="card" style="padding:10px">
              <div class="alert alert-primary text-center" style="height:250px">
                         <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">
                      <h3 class="card-text">Totle Bus Counter : {{ $Sub_counter }}</h3>
                       </div>
                       <br>
                       @foreach ($Sub_counterget as $key => $value)
                        <strong> <a href="{{ url('available/bus') }}/{{ $value->id }}" style="color:#fff;" type="text" class="badge
                          @if ($value->allow_counter_status==2){{ 'bg-danger' }}@else{{ 'bg-primary' }}@endif">{{ $value->sub_counter }}</a></strong>
                       @endforeach

                    </div>
               </div>
          </div>


          <div class="col-lg-4">
              <div class="card" style="padding:10px">
              <div class="alert alert-primary text-left" style="height:250px">
                  <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">
               <h3 class="card-text text-center">Totle Bus : {{ $BusName }}</h3>

                </div>
                <br>
            <div class="text-center">
              <p class="card-text text-center">AC Bus : {{ count($bus_ac)  }}</p>
              <p class="card-text text-center">NON AC : {{ count($bus_nonac) }}</p>
                     <a href="{{ url('view_all_bus')}}" class="badge text-center" style="background-color:#e0006c; color:#fff">View all Bus  -></a>

            </div>

             </div>
             </div>
             </div>


             <div class="col-lg-4">
                 <div class="card" style="padding:10px">
                 <div class="alert alert-primary text-center" style="height:250px">

                    <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">
                      <h4 class="card-text">Tickets Have Been Sold : {{ count($PurchaseTicketget_payment_status) }}</h4>

                    </div>
                    <br>


                              <p>Totle :      @php
                                    $sum = 0;
                              foreach($PurchaseTicketget_payment_status as $key=>$value)
                              {
                              $sum+= $value->class_price*$value->ticket_quentity;
                              }
                              echo $sum
                                    @endphp
                             Taka</p>
                             <a href="{{ url('totle_counter_amount')}} " class="badge text-center" style="background-color:#e0006c; color:#fff">All Counter Totle Amount -></a>

                  </div>
                    </div>
             </div>
             <div class="col-lg-4">
                 <div class="card" style="padding:10px">
                 <div class="alert alert-primary text-center" style="height:250px">

                    <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">
                      <h4 class="card-text">User Purchase Totle Ticket </h4>

                    </div>
                    <br>
                    @php

                      $sum=0;
                    @endphp
                     @foreach ($Busdateligets as $key => $value)

                        @php
                          $sum+=(50-$value->totle_seat);
                        @endphp

                   </p>
                     @endforeach

                       <p>Totle {{ $sum }} Ticket</p>
                       <a href="{{ url('totle_counter_ticket')}} " class="badge text-center" style="background-color:#e0006c; color:#fff">All Counter Ticket -></a>


                  </div>
                    </div>
             </div>




          {{-- <p class="card-text">{{ $Counterget }}</p>
          <p class="card-text">{{ $Sub_counterget }}</p> --}}
          {{-- <p class="card-text">{{ $BusNameget }}</p> --}}
          {{-- <p class="card-text">{{ $Busdateliget }}</p> --}}
        {{-- <p class="card-text">{{ $PurchaseTicketget }}</p> --}}








@endsection

@section('javascript_content')
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection

@section('javascript_content')
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection
