@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">"
      <div class="col-lg-12 m-auto" style="padding:25px; border:5px solid #eee">
        <div class="text-center" style="padding:25px; border:5px solid #eee;background-color: #e0006c;">
              <h3>Bangladesh Bus Transport</h3>
        </div>
        <div class="text-right pt-2 pb-3">
                     <button type="button" class="btn btn-info text-right" data-toggle="modal" data-target="#RONY">Add Counter</button>
       </div>
        <h1 class="text-right">Search Counter</h1>
        @error ('counter')
                   <div class="alert alert-danger">
                        <div class="tt">
                           <li>{{ $message }}</li>
                        </div>
                   </div>
          @enderror
        @error ('totle_counter')
                   <div class="alert alert-danger">
                        <div class="tt">
                           <li>{{ $message }}</li>
                        </div>
                   </div>
          @enderror

        @if (session('priya_success'))
          <div class="bg-warning text-center">
               <h1 >{{ session('priya_success') }}</h1>
          </div>
        @endif
        @if (session('counter_delete'))
          <div class="bg-warning text-center">
               <h1 >{{ session('counter_delete') }}</h1>
          </div>
        @endif
        @if (session('success_counter'))
          <div class="alert alert-success">
            {{ session('success_counter') }}
          </div>
        @endif
        @if (session('active_status'))
          <div class="alert alert-success">
            {{ session('active_status') }}
          </div>
        @endif
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                   <th>Serial</th>
                   <th>Created By Admin</th>
                   <th>Counter</th>
                   <th>Totle Counter</th>
                   <th>Available Counter</th>
                   <th>Created</th>
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>


              @foreach ($counters as  $value)
                <tr>
                   <td>{{ $loop->index+1}}</td>
                   <td>{{ App\User::find($value->user_id)->name }}</td>
                   <td>{{ $value->counter }}</td>
                   <td>{{ $value->totle_counter }}</td>
                   <td>
                     @php
                       $start=1;
                     @endphp
                     @foreach ($value->totle_sub_counter as $sub_counter_names)
                       {{ $start++ }} : {{ $sub_counter_names->sub_counter}}<br>
                      @php
                        session(['allow_counter'=>$sub_counter_names->allow_counter_status])
                      @endphp
                     @endforeach
                          </td>
                   <td>
                     <li> {{ $value->created_at->format('h:i:s:A') }}</li>
                    <li> {{ $value->created_at->format('d/m/Y') }}</li>
                    <li> {{ $value->created_at->diffForHumans() }}</li>
                   </td>
                   <td>
                      <a class="btn btn-success" href="{{ url('view/all_counter') }}/{{ $value->id }}">All Counter</a>
                      <a class="btn btn-info" href="{{ url('edit/counter') }}/{{ $value->id }}">Edit</a>
                      {{-- <a class="btn btn-danger" href="{{ url('delete/counter') }}/{{ $value->id }}">Delete</a> --}}

       @if (session('allow_counter')==1)
           <a class="btn btn-warning" href="{{ url('dactive/counter') }}/{{ $value->id }}">Dactive Counter</a>
        @else
           <a class="btn btn-primary" href="{{ url('active/counter') }}/{{ $value->id }}">Active Counter</a>
       @endif







                    </td>

                </tr>
              @endforeach

            </tfoot>
          </table>
      </div>

<div class="col-lg-4">
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
       <form action="{{ url('counter/post') }}" method="post">
         @csrf
   <div class="form-group">

   <label for="">Gruop Counter Name</label>
   <input type="text" name="counter"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please Inter Your Main Counter">
   </div>
   <div class="form-group">
   <label for="">Totle Counter</label>
   <input type="text" name="totle_counter" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please Inter Your Main Counter">

   </div>
   <button type="submit" class="btn btn-success">Submit</button>
   </form>
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
