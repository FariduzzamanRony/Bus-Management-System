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
    text-decoration: none;
  }
  h2, .h2 {
	font-size:20px;
  color: #111;
	font-weight: bold;
}
  </style>
<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 m-auto">


      <div class="customer bg-info" style="padding:10px; background-color: #e0006c;">
           <h1 class="text-center">Search Counter</h1>
      </div>

      <br>

        <div class="form-group">
          <label for="">From Station</label>
        <select type="text" name="counter_bus_name_id"  class="form-control" id="counter_bus_id" aria-describedby="emailHelp" placeholder="">
                      <option  value="">None</option>
              @foreach ($Sub_counter as  $Sub_counter_value)
                @if ($Sub_counter_value->allow_counter_status==1)
                @if ($Sub_counter_value->bus_status==2)
                  {{ $Sub_counter_value }}
                       <option  value="{{ $Sub_counter_value->id }}">{{ $Sub_counter_value->sub_counter }}</option>
                @endif
                @endif


              @endforeach
          </select>
  </div>

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

                 <p>empty</p>

      </div>
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
  $(document).ready(function(){
    $('#counter_name_id').select2();
    $('#sub_counter_name_id').select2();
    $('#counter_bus_id').select2();
    $('#all_bus_name_id').select2();

    $('#counter_name_id').change(function(){
      var counter_id = $(this).val();

      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


          $.ajax({
                 type:'POST',
                 url:'/customer_show/counter',
                 data: {counter_id:counter_id},
                 success:function (data){
                  $('#sub_counter_name_id').html(data);
                 }
          });



    });





    $('#counter_bus_id').change(function(){
      var counter_bus_id = $(this).val();

      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });


          $.ajax({
                 type:'POST',
                 url:'/customer_show/counter_bus',
                 data: {counter_bus_id:counter_bus_id},
                 success:function (data){
                   $('#ffffff').html(data);
                  // alert(data);

                 }
          });



    });





  });

  $(document).ready(function() {
    $('.btn-infos').click(function(){
      alert('pk');
 });
});


  </script>

@endsection
