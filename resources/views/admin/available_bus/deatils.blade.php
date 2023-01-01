@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <div class="bg-success" style="padding:10px;">
          <h1 class="text-center">Ticket Deatils:</h1>
        </div>
        <div class="text-right pt-2 pb-3">
                 <button type="button" class="btn btn-info text-right" data-toggle="modal" data-target="#deatils">Add deatils</button>
       </div>
@if (session('success_bsdatelis'))
  <div class="alert alert-success">
      {{session('success_bsdatelis')}}
  </div>
@endif

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
                 <th>Action</th>
              </tr>
          </thead>
            <tbody>



@foreach ($all_bus_deatils as  $value)
  <tr class="
  @if (Carbon\Carbon::now()->format('Y-m-d') > $value->ticket_date)
  bg-warning
  @endif">
     <td>{{ $value->id }} </td>
     <td>
       {{-- id={{ $value->avaliable_bus_id }} = --}}
       {{ App\BusName::find($value->avaliable_bus_id )->bus_name}} </td>
     <td>

       @if (Carbon\Carbon::now()->format('Y-m-d') > $value->ticket_date)
      <p class="bg-danger badge">Date Expired</p>
      @else
        Journey Date
       @endif

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
     <td>
        <a class="btn btn-success" href="{{ url('bus_deatlis_edit') }}/{{ $value->id }}">Edit</a>
        <a class="btn btn-danger" href="{{ url('bus_deatlis_delete') }}/{{ $value->id }}">Deleted</a>
     </td>




  </tr>
@endforeach



            </tfoot>
          </table>
      </div>
  </div>







  <div class="modal fade" id="deatils" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Avaliable Bus Counter Add</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div class="modal-body-photo">
   </div>
       <div class="modal-body">
        <form method="post" action="{{ url('bus_deatils/post') }}">
          @csrf
          <div class="form-group">
          <label for=""> Station er id</label>
            <input type="text" name="bus_deatils_ids" value="{{ $bus_deatils_ids->id }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
          <label for="">Totle seat</label>
            <input type="text" name="totle_seat" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>

          <div class="form-group">
          <label for="">Avaliable Ticket Date</label>
            <input type="date" name="ticket_date" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
          <label for="">Where Does The Bus Stop</label>
            <input type="text" name="bus_route" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="">How Many Minutes Will It Stop</label>
            <select type="text" name="breck_time"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                 <option  value=0>None</option>
                 <option  value=10>10 Minutes</option>
                 <option  value=15>15 Minutes</option>
                 <option  value=20>20 Minutes</option>
                 <option  value=25>25 Minutes</option>
                 <option  value=30>30 Minutes</option>
              </select>
          </div>
          <div class="form-group">
          <label for="">Journey Time</label>
            <select type="text" name="journey_time"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                 <option  value=0>None</option>
                 <option  value=1>1 Hour</option>
                 <option  value=2>2 Hour</option>
                 <option  value=3>3 Hour</option>
                 <option  value=4>4 Hour</option>
                 <option  value=5>5 Hour</option>
                 <option  value=6>6 Hour</option>
                 <option  value=7>7 Hour</option>
                 <option  value=8>8 Hour</option>
                 <option  value=9>9 Hour</option>
                 <option  value=10>10 Hour</option>
                 <option  value=11>11 Hour</option>
                 <option  value=12>12 Hour</option>
                 <option  value=13>13 Hour</option>
                 <option  value=14>14 Hour</option>
                 <option  value=15>15 Hour</option>
              </select>
          </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
