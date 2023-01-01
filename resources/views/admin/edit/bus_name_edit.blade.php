@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">

<div class="col-lg-6 m-auto">
{{-- @if (session('counter_edit'))
  <div class="alert alert-success">
    {{ session('counter_edit') }}
  </div>
@endif --}}
{{-- @if (session('counter'))
   <div class="alert alert-danger">
        <div class="tt">
           <li>{{ $message }}</li>
        </div>
   </div>
@endif --}}
{{-- @if ($errors->all())
@foreach ($errors->all() as $value)
    <div class="alert alert-danger">
       <li>{{ $value }}</li>
    </div>
@endforeach
@endif --}}

@if (session('bus_information'))
  <div class="alert alert-success">
    {{ session('bus_information') }}
  </div>
@endif
  <div class="from">
    <div class="Counter-add " style="border:1px solid #1111; padding:10px">
      <h3 class="bg-info text-center pt-1 pb-1">Bus Information Edit </h3>
      {{-- <a class="btn btn-success" href="{{ url('available/bus/'.$bus_all->id) }}">Back</a> --}}
    <form action="{{ url('bus_name_edit/post') }}" method="post">
      @csrf





<div class="form-group">
  <input type="text" name="buuss_id" value="{{ $bus_all->id }}"  class="form-control">
  <div class="form-group">
  <label for="">To Station</label>

    <input type="text" name="to_station"  value="{{$bus_all->to_station}} " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
  <label for="">Bus Name</label>
  @error ('bus_name')
       <div class="alert alert-danger">
         {{ $message }}
       </div>
  @enderror
    <input type="text" name="bus_name"  value="{{$bus_all->bus_name}} " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
  <label for="">*Select-Class</label>
  @error ('bus_class')
       <div class="alert alert-danger">
         {{ $message }}
       </div>
  @enderror
  <select type="text" name="bus_class"  value="{{$bus_all->bus_class}} " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
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
    <input type="text" name="class_price" value="{{$bus_all->class_price}} "  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
  <label for="">Bus Time</label>
  @error ('bus_time')
       <div class="alert alert-danger">
         {{ $message }}
       </div>
  @enderror
    <input type="time" name="bus_time" value=" {{$bus_all->bus_time}} "  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
