@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <div class="alert alert-primary text-center">
                         <h2>Admin : {{ App\User::find(Auth::id())->name }}</h2>
                    </div> --}}
                    <div class="text-center">
                      <div class="alert alert-info">
                        @if (Auth::user()->role==2)
                            <h1>Welcome</h1>
                        @endif
                        @if (Auth::user()->role==3)
                          <div class="aler alert-danger">
                            <h1>Profile Block</h1>
                          </div>

                        @endif

                      </div>
                      <img width=500; src="https://images.unsplash.com/photo-1600206085398-f6ede93b06f8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YnVzJTIwc3RhdGlvbnxlbnwwfHwwfHw%3D&w=1000&q=80" alt="">
                      @if (session('ssl_message'))
                        <div class="alert alert-success" role="alert">
                          <h1 class="text-center">{{ session('ssl_message') }}</h1>
                        </div>
                      @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
