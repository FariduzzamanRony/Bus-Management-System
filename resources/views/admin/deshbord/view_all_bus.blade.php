@extends('layouts.app')

@section('content')


<div class="container">
  <div class="card">
      <div class="card-header"> <a class="btn btn-info" href="{{ url('home') }}">{{ __('Back') }}</a> </div>

      <div class="card-body">
          @if (session('status'))
              <div class="alert alert-success" role="alert">
                  {{ session('status') }}
              </div>
          @endif


      </div>
  </div>
  <div class="row">

    <div class="col-lg-6">
        <div class="card" style="padding:10px">
        <div class="alert alert-primary text-left">
          <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">

         <h3 class="card-text text-center">NON AC : {{ count($bus_nonac) }}</h3>
          </div>
          <br>
          @php

          $start=1;
          @endphp
                    @foreach ($bus_nonac as $key => $value)


                               <p class="text-black">{{$start++}}. {{ $value->bus_name }}
                                 -{{ App\Counter::find(App\Sub_counter::find($value->from_station)->counter_id)->counter}}
                                 -{{ App\Sub_counter::find($value->from_station)->sub_counter }} To {{ $value->to_station }}
                                 --<strong style="font-size:16px;color:@if ($value->bus_class=='AC' ) #d70c29 @else #2c00ff @endif;">{{ $value->bus_class }}</strong> <a href="{{ url('bus/deatils') }}/{{ $value->id }}"> Deatels </a> Bus</p>


                    @endforeach


       </div>
       </div>
     </div>
<div class="col-lg-6">
    <div class="card" style="padding:10px">
    <div class="alert alert-primary text-left">
      <div class="bd-info" style="background-color: #e0006c; padding:10px;color:#fff">

     <h3 class="card-text text-center">AC Bus : {{ count($bus_ac)  }}</h3>

      </div>
      <br>
@php

$start=1;
@endphp
          @foreach ($bus_ac as $key => $value)


                     <p class="text-black">{{$start++}}. {{ $value->bus_name }}
                       -{{ App\Counter::find(App\Sub_counter::find($value->from_station)->counter_id)->counter}}
                       -{{ App\Sub_counter::find($value->from_station)->sub_counter }} To {{ $value->to_station }}
                       --<strong style="font-size:16px;color:@if ($value->bus_class=='AC' ) #d70c29 @else #2c00ff @endif;">{{ $value->bus_class }}</strong> <a href="{{ url('bus/deatils') }}/{{ $value->id }}"> Deatels </a> Bus</p>


          @endforeach



   </div>
   </div>
   </div>

 </div>
</div>
@endsection
@section('javascript_content')
<script type="text/javascript" class="init">
  $(document).ready(function() {
    $('#example').DataTable();
  } );
    </script>
@endsection
