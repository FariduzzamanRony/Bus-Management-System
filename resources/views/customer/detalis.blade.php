@extends('layouts.app')

@section('content')



  <style>
  .rony{
    float:left;
    margin-left: 20px;
  }
  .btn-infos {
  	color: #fff;
  	background-color: #e0006c;
  	border-color: #e0006c;
    font-sixe:20px;
  	padding: 10px;
  }
  .btn-infos:hover{
    color: #111;
  }
  </style>
  <style>
  * {
    box-sizing: border-box;
  }

  .box {
    float: left;
    width: 50%;
    height:150;
    padding: 50px;
  }

  .clearfix {
      margin-top: 15px;
      padding-top: 15px;
  border:1px solid #e0006c;
  font-weight:bold;


  }
  .clearfix::after {

    text-align: center;
    content: "";
    clear: both;
    display: table;

  }
  </style>
  </head>
  <body>
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
           <div class="rgrd">

            <div class="cess" style="padding:10px;background-color:#e0006c;">
              <h1 class="text-center" >Ticket Deatils:</h1>
            </div>

  @forelse ($busdatelis as  $value)

@if (Carbon\Carbon::now()->format('Y-m-d') <= $value->ticket_date)
    <div class="clearfix text-center" style="padding:10px;">
      <h3 class="text-center">Bus Name : {{ App\BusName::find($value->avaliable_bus_id)->bus_name }}</h3>
       <h4 class="text-center">Ticket Date : {{ $value->ticket_date }}</h4>
       <hr>
      <div class="box"style="padding:10px; font-size:16px; font-weight:400; color:#e0006c;">
        <p>Totle Seat : 50 </p>
        <p>Bus Route : {{ $value->bus_route }}</p>
        <p>Journey Time : {{ $value->journey_time }} Hours</p>


      </div>
      <div class="box"style="padding:10px;color:#e0006c; font-size:16px; font-weight:400;">

          <p type="text" class="
          @if ($value->totle_seat==0)
            badge bg-warning
            @else

          @endif
          " name="button">Avaliable Seat : @if ($value->totle_seat==0)
             NO seat
             @else
               {{ $value->totle_seat }}
           @endif</p>




        <p>Breck Time : {{ $value->breck_time }} Minutes</p>

      </div>

      @if ($value->totle_seat>=1)
        <a href="{{ url('purchase/ticket') }}/{{ $value->id}}"class="text-center btn btn-primary">BAY TIKECT</a>

      @endif

 </div>
 @else

  <div class="ext bg-danger text-center pt-4 mt-5">
      <h1 style="color:#fff">Date Expired</h1>";
  </div>
@endif
    @empty
        <div class="clearfix text-center">
          <h3 class="text-center text-danger">No Avaliable Bus</h3>
      </div>
  @endforelse


</div>
</div>
</div>
</div>
</section>












@endsection
@section('javascript_content')
  <script type="text/javascript" class="init">
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection
