@extends('layouts.app')

@section('content')








<style>
.btn-success {
color: #fff;
background-color: #38c172;
border-color: #38c172;
margin-left: 50px;
}

.selected{
    border-style: inset;
    background-color: #0A0;
    color: #0F0;
}

.reserved {
	border-style: outset;
	background-color: red;
	color: darkred;
}
</style>
<style>
* {
  box-sizing: border-box;
}

.box {
  float: left;
  width: 33.33%;
  height:150;
  padding: 50px;
}
.ac {
  float: left;
  width: 50%;


}

.clearfix {
	background-color: #F2F2F2;
	box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
	margin-top: 15px;
	padding-top: 15px;
	font-weight: bold;
}
.clearfix::after {

  text-align: center;
  content: "";
  clear: both;
  display: table;

}
.dddd{
  width:100%;

}



.main h3{
  text-align: center;

}
</style>





<section id="service">
      <div class="container">
          <div class="row">
              <div class="col-lg-12 m-auto">
                  <div class="service-main">
                      <div class="heading-item text-center">
                        <h2 class="text-center" style="padding:20px; padding:10px;background-color:#e0006c; color:#fff;"><strong>Ticket Deatils</strong</h2>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6 m-auto pb-5">
                  <div class="service-main">
                      <div class="heading-item text-center">
                        <form class="" action="{{ url('tickt_post/success') }}" method="post">

                          @csrf
                        <h3>Counter: {{ucfirst(App\Sub_counter::find($user_ticket_bus_deatiles->from_station)->sub_counter)  }} </h3>
                        <h3>Bus Deraction: {{ucfirst(App\Sub_counter::find($user_ticket_bus_deatiles->from_station)->sub_counter)  }} TO {{ $user_ticket_bus_deatiles->to_station }} </h3>
                             <h3 class="text-center">Date : {{ $ticket_deatils->ticket_date }}</h3>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-4 col-sm-6">
                  <div class="service-main1">
                      <div class="service-item1">
                        <p>Bus name : {{ $user_ticket_bus_deatiles->bus_name }}</p>
                        <p>Totle Seat : 50</p>
                        <p>Bus Route : {{ $ticket_deatils->bus_route }}</p>
                        <p>Journey Time  : {{ $ticket_deatils->journey_time }} Hours</p>

                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6">
                  <div class="service-main1">
                      <div class="service-item1">
                        <p>Bus Class : {{ $user_ticket_bus_deatiles->bus_class}}</p>
                        <p>Avaliable Seat : {{ $ticket_deatils->totle_seat }}</p>
                        <p>Price : {{ $user_ticket_bus_deatiles->class_price}}</p>
                        <p>Bus Time : {{ $user_ticket_bus_deatiles->bus_time }}</p>

                        <p>Brack Time : {{ $ticket_deatils->breck_time }} Minutes</p>

                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-sm-6 m-auto">
                  <div class="service-main1">
                      <div class="service-item1">

                        @if ($errors->all())
                          @foreach ($errors->all() as $value)
                            <div class="alert alert-danger">
                               <li>{{ $value }}</li>
                            </div>
                          @endforeach
                        @endif
                                <label for=" " style="color:#111">* What Quantity tickets will be cut</label>
                                @if (session('quantity'))
                                <div class="alert alert-warning">
                                        <p>{{ session('quantity') }}</p>
                                </div>
                                  @endif
                                <input style="color:#e0006c;" type="text" name="quantity_ticket" value="{{ old('quantity_ticket') }}" placeholder="Ticket Quentity">

                                <input type="hidden" name="ticket_deatils_id" value="{{ $ticket_deatils->id }}" placeholder="Ticket Quentity">
                                <br>
                                <br>

                                <h5 class="" style="color:#111">* Please Payment Method Selected</h5>

                                            <label for="css">Card Banking</label>
                                             <input type="radio"  name="payment_opction" value="1">
                                             <br>
                                <label for="javascript">Moblie Banking And Card</label>
                                 <input type="radio"  name="payment_opction" value="2">


            <br>
            <br>

             
             



                      </div>
                  </div>
              </div>
              <div class="container bg-light">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div>
                </div>


                  </form>
          </div>
      </div>
  </section>



@php

  session(['from_station'=>$user_ticket_bus_deatiles->from_station]);
  session(['to_station'=>$user_ticket_bus_deatiles->to_station]);
  session(['ticket_date'=>$ticket_deatils->ticket_date]);
  session(['bus_name'=>$user_ticket_bus_deatiles->bus_name]);
  session(['class_price'=>$user_ticket_bus_deatiles->class_price]);
  session(['bus_class'=>$user_ticket_bus_deatiles->bus_class]);
  session(['journey_time'=>$ticket_deatils->journey_time]);
  session(['bus_time'=>$user_ticket_bus_deatiles->bus_time]);
  session(['totle_seat'=>$ticket_deatils->totle_seat]);
  session(['avaliable_seat'=>$ticket_deatils->avaliable_seat]);
  session(['breck_time'=>$ticket_deatils->breck_time]);
  session(['bus_route'=>$ticket_deatils->bus_route]);
  session(['Id'=>$ticket_deatils->id]);
@endphp



@endsection
@section('javascript_content')

@endsection
