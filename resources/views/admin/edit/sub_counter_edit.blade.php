@extends('layouts.app')

@section('content')





<section>
  <div class="container">
    <div class="row">

<div class="col-lg-6 m-auto">
@if (session('sub_counter'))
  <div class="alert alert-success">
    {{ session('sub_counter') }}
  </div>
@endif




@error ('sub_counter')
           <div class="alert alert-danger">
              {{ $message }}
        </div>
        @enderror
{{-- @if ($errors->all())
   @foreach ($errors->all() as $value)
      <div class="alert alert-danger">
         <li>{{ $value }}</li>
      </div>
   @endforeach
@endif --}}


  <div class="from">
    <div class="Counter-add " style="border:1px solid #1111; padding:10px">
      <h3 class="bg-info text-center pt-1 pb-1">Counter Edit <h3>
      <form action="{{ url('edit/sub_counter/post') }}" method="post">
        @csrf
<div class="form-group">

  <input type="hidden" name="id" value="{{ $sub_counters->id }}"  class="form-control">
</div>

<div class="form-group">

<label for="">Please Enter Sub Counter</label>

  <input type="text" name="sub_counter" value="{{  $sub_counters->sub_counter  }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
