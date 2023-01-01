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
        <div class="tonu" style="padding:10px; background-color: #e0006c;">
          <h1 class="text-center">{{ $sub_counters_ids->sub_counter }} Bus Counter Information</h1>
        </div>
        <div class="text-right pt-2 pb-3">
                     <button type="button" class="btn btn-info text-right" data-toggle="modal" data-target="#RONY">Add Bus</button>
       </div>
@if (session('success_bus_name'))
  <div class="alert alert-success">
      {{session('success_bus_name')}}
  </div>
@endif
 @if ($errors->all())
 @foreach ($errors->all() as $value)
     <div class="alert alert-danger">
        <li>{{ $value }}</li>
     </div>
 @endforeach
@endif

        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                 <th>No:</th>
                 <th>Admin</th>
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
                   <td>{{ App\User::find($value->user_id)->name}}</td>
                   <td> {{ $value->bus_name}}</td>
                   <td>{{ $value->bus_class }}</td>
                   <td>{{ $value->class_price }}</td>
                   <td>{{ App\Sub_counter::find($value->from_station)->sub_counter}}</td>
                   <td>{{ $value->to_station}}</td>
                   <td>{{ $value->bus_time}}</td>
                   <td>
                     <a class="btn btn-info" href="{{ url('bus/deatils') }}/{{ $value->id }}">Add deatils</a>
                     <button value="{{ $value->id }}" class="counter_name_id btn btn-primary" type="button"  data-toggle="modal" data-target="#deatils">Show Deatils</button>

   <a class="btn btn-success" href="{{ url('bus_name_edit') }}/{{ $value->id }}">Edit</a>
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


  <div class="modal fade" id="RONY" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form method="post" action="{{ url('bus_name/post') }}">
          @csrf
          <div class="form-group">
						    <input type="text" name="sub_counter_id" value="{{ $sub_counters_ids->id}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <label for="">From Station</label>
          <select type="text" name="from_station"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
               <option  value="{{ $sub_counters_ids->id}}">{{ $sub_counters_ids->sub_counter }}</option>
            </select>
          </div>
          <div class="form-group">
          <label for="">To Station</label>
					@error ('to_station')
               <div class="alert alert-danger">
               	 {{ $message }}
               </div>
					@enderror
            <input type="text" name="to_station"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
          <label for="">Bus Name</label>
					@error ('bus_name')
							 <div class="alert alert-danger">
								 {{ $message }}
							 </div>
					@enderror
            <input type="text" name="bus_name"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
					<div class="form-group">
          <label for="">*Select-Class</label>
					@error ('bus_class')
							 <div class="alert alert-danger">
								 {{ $message }}
							 </div>
					@enderror
          <select type="text" name="bus_class"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                      <option  value="">NONE</option>
							 <option  value="AC">AC</option>
               <option  value="NON_AC">NON AC</option>
            </select>
          </div>
          <div class="form-group">
          <label for="">Ticket Price</label>
					@error ('class_price')
							 <div class="alert alert-danger">
								 {{ $message }}
							 </div>
					@enderror
            <input type="text" name="class_price" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
          <label for="">Bus Time</label>
					@error ('bus_time')
							 <div class="alert alert-danger">
								 {{ $message }}
							 </div>
					@enderror
            <input type="time" name="bus_time" value="" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
