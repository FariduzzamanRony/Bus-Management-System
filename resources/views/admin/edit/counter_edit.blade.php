@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">

<div class="col-lg-3 m-auto">
@if (session('counter_edit'))
  <div class="alert alert-success">
    {{ session('counter_edit') }}
  </div>
@endif
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


  <div class="from">
    <div class="Counter-add " style="border:1px solid #1111; padding:10px">
      <h3 class="bg-info text-center pt-1 pb-1">Counter Edit {{ $counters->counter }}</h3>
    <form action="{{ url('counter/edit/post') }}" method="post">
      @csrf





<div class="form-group">
  @if (session('counter'))
     <div class="alert alert-danger">
          <div class="tt">
             <li>{{ $message }}</li>
          </div>
     </div>
  @endif
<label for="">Please Enter Counter name</label>
@error ('counter')
       <div class="alert alert-danger">
          {{ $message }}
    </div>
    @enderror
  <input type="hidden" name="id" value="{{ $counters->id }}"  class="form-control">
  <input type="text" name="counter" value="{{ $counters->counter }}"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>

<div class="form-group">
  @error ('totle_counter')
         <div class="alert alert-danger">
            {{ $message }}
      </div>
      @enderror
<label for="">Please Enter Sub Counter</label>

  <input type="text" name="totle_counter" value="{{ $counters->totle_counter }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
