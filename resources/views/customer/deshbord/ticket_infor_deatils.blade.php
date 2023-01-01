@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <div class="bg-success mb-3" style="padding:10px;">
          <h1 class="text-center">Ticket Deatils:</h1>
        </div>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                 <th>No:</th>
                 <th>Bus</th>
                 <th>Avaliable Date</th>
                 <th>Bus Route</th>
                 <th>Break Time</th>
                 <th>Journey Time</th>
                 <th>Totle Seat</th>
                 <th>Avaliable Seat</th>

              </tr>
          </thead>
            <tbody>



@forelse ($all_bus_deatils as  $value)
  @if (Carbon\Carbon::now()->format('Y-m-d') > $value->ticket_date)


  <tr>
     <td>{{ $value->id }} </td>
     <td>
       {{-- id={{ $value->avaliable_bus_id }} = --}}
       {{ App\BusName::find($value->avaliable_bus_id )->bus_name}} </td>
     <td>


        Journey Date


       <br>
       {{ $value->ticket_date }}
        </td>


     <td>{{ $value->bus_route }}</td>
     <td>{{ $value->breck_time }} Minutes</td>
     <td class=" text-center">{{ $value->journey_time }} Hour</td>
     <td class="text-center"> 50</td>
     <td class="text-center">
       <p type="text" class="badge bg-success" name="button"> @if ($value->totle_seat==0)
          All Seat Booiking
          @else
            {{ $value->totle_seat }}
        @endif</p>


     </td>





  </tr>
    @endif
  @empty
     <tr>
        <td colspan="50" class="text-center text-danger"><h4>No Data Availavel</h4></td>
      </tr>
  @endforelse




            </tfoot>
          </table>
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
