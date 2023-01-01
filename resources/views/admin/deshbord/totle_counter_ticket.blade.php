@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-10 m-auto">
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
                         <th>Date</th>
                         <th>Bus Name</th>
                         <th>Bus class</th>
                         <th>Deraction </th>
                         <th>Purchase Ticket</th>

                      </tr>
                  </thead>
                    <tbody>



                      @php
                            $start=1;

                      @endphp
                @foreach ($Busdateligets as $key => $value)
                  <tr>
                    <td>{{ $start++ }}</td>
                    <td>{{$value->ticket_date}}</td>
                    <td>{{ App\BusName::find($value->avaliable_bus_id)->bus_name }}</td>
                    <td>{{ App\BusName::find($value->avaliable_bus_id)->bus_class }}</td>
                    <td>{{ App\Sub_counter::find(App\BusName::find($value->avaliable_bus_id)->from_station)->sub_counter}} TO {{ App\BusName::find($value->avaliable_bus_id)->to_station }}</td>


                    <td><strong class="badge" style=" background-color:{{ (50>$value->totle_seat) ? '#1600ae' : '#e0006c' }}; color:#fff; ">
                    {{50-$value->totle_seat}}</strong></td>
                  </tr>


         @endforeach


                  </table>

            </div>
        </div>
          </div>


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
