@extends('layouts.app')

@section('content')



<style>
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

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <div class="tonu mb-2" style="padding:10px; background-color: #e0006c;">
          <h1 class="text-center">Bus Counter Information</h1>
        </div>

        <table id="costomerexample" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                 <th>No:</th>
                 <th>Bus</th>
                 <th>Class</th>
                 <th>Price</th>
                 <th>From Station</th>
                 <th>To Station</th>
                 <th>Time</th>
                 <th>Action</th>
              </tr>
          </thead>
            <tbody>


         @foreach ($BusNames as  $value)


                <tr>
                   <td>{{ $value->id }}</td>
                   <td> {{ $value->bus_name}}</td>
                   <td>{{ $value->bus_class }}</td>
                   <td>{{ $value->class_price }} Tk</td>
                   <td>{{ App\Sub_counter::find($value->from_station)->sub_counter}}</td>
                   <td>{{ $value->to_station}}</td>
                   <td>{{ $value->bus_time}}</td>
									 <td>

										 <button value="{{ $value->id }}" class="counter_name_id btn btn-primary" type="button"  data-toggle="modal" data-target="#deatils">Show Deatils</button>


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
      <div class="modal-header" style="background-color:#e0006c;">
        <h4 class="modal-title" style="color:#fff;">Avaliable Bus Deatiles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="modal-body-photo text-center card" style="color:#e0006c;padding:10px; margin-bottom:20px;" id="ffffff">



        </div>
        </div>
      </div>




    </div>
  </div>
</div>


  <div class="modal fade" id="deatils" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#e0006c;">
        <h4 class="modal-title" style="color:#fff;">Avaliable Bus Deatiles</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="card">
        <div class="card-body">
          <div class="modal-body-photo text-center card" style="color:#e0006c;padding:10px; margin-bottom:20px;" id="ffffff">



        </div>
        </div>
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
$('.counter_name_id').click(function(){
  var avaliable_bus_id = $(this).val();
  $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

      $.ajax({
             type:'POST',
             url:'/avaliable_bus_id/counter',
             data: {avaliable_bus_id:avaliable_bus_id},
             success:function (data){
               $('#ffffff').html(data);

             }
      });

});



    } );

      </script>

@endsection
