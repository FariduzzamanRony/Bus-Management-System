@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <h1 class="text-center"><p>
          @if (session('ttttttttttt')==2)
             <button type="button" class="btn btn-danger">Dactive Counter</button>
             @else
               <button type="button" class="btn btn-primary">Active Counter</button>
          @endif
        </p></h1>
            <div class="text-center" style="padding:25px; border:5px solid #eee;background-color: #e0006c;">
              <h3>Bangladesh Bus Transport</h3>
        </div>
        <div class="text-right pt-2 pb-3">
                     <button type="button" class="btn btn-info text-right" data-toggle="modal" data-target="#RONY">Add Counter</button>
       </div>
        <h1
        class="text-right">Search Counter</h1>
        @error ('sub_counter')
                   <div class="alert alert-danger">
                        <div class="tt">
                           <li>{{ $message }}</li>
                        </div>
                   </div>
          @enderror
        @if (session('success_sub_counter_error'))
          <div class="alert alert-danger">
            {{ session('success_sub_counter_error') }}
          </div>
        @endif
        @if (session('format'))
          <div class="alert alert-danger">
            {{ session('format') }}
          </div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                   <th>Serial</th>
                   <th>Id</th>
                    <th>Created By Admin</th>

                   <th>Counter Name</th>
                   <th>Sub_counter</th>
                   <th>Created</th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
       @foreach ($Sub_counter_name as  $value)
                <tr>
                   <td>{{ $loop->index+1}}</td>
                   <td>{{$value->id }}</td>
                   <td>{{App\User::find( $value->user_id)->name}}</td>
                   @php
                     session(['ttttttttttt'=>$value->allow_counter_status])
                   @endphp
                   <td> {{ App\Counter::find($value->counter_id)->counter }}</td>
                    <td>{{ $value->sub_counter }}</td>
                   <td>
                     <li> {{ $value->created_at->format('h:i:s:A') }}</li>
                                                <li> {{ $value->created_at->format('d/m/Y') }}</li>
                   </td>
                     <td>
                       <a class="btn btn-primary" href="{{ url('available/bus') }}/{{ $value->id }}">Available Bus</a>
                       <a class="btn btn-danger" href="{{ url('delete/sub_counter') }}/{{ $value->id }}">Counter-format</a>
                       <a class="btn btn-info" href="{{ url('edit/sub_counter') }}/{{ $value->id }}">Edit</a>
                     </td>






                </tr>
 @endforeach

            </tfoot>
          </table>
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
       <div class="from">
         <div class="Counter-add " style="border:1px solid #1111; padding:10px">
           <h3 class="bg-info text-center pt-1 pb-1">Counter  Add</h3>
           <p class="text-danger">You Can Add Only {{ $counter_id_value->totle_counter  }} Times Insert</p>
         <form action="{{ url('sub_counter/post') }}" method="post">
           @csrf
     <div class="form-group">
     <label for="">Gruop Counter Name</label>
     <select type="text" name="counter_id"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          <option  value="{{ $counter_id_value->id }} ">{{ $counter_id_value->counter }}</option>
       </select>
     </div>
      {{-- <label for="">Counter = {{ $counter_id_value->id }}</label> --}}
     <input type="hidden" name="division_counter_id" value="{{ $counter_id_value->id }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">


     {{-- <label for="">Counter = {{ $counter_id_value->counter }}</label> --}}
     <input type="hidden" name="division_counter_name" value="{{ $counter_id_value->counter }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

     {{-- <label for="">Totle Counter = {{ $counter_id_value->totle_counter}}</label> --}}
     <input type="hidden" name="division_totle_counter_id" value="{{ $counter_id_value->totle_counter}}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">



     <div class="form-group">
     <label for="">Counter name</label>

       <input type="text" name="sub_counter"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>
     <button type="submit" class="btn btn-primary">Submit</button>
     </form>

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
    $(document).ready(function() {
      $('#example').DataTable();
    } );
      </script>
@endsection
