<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- datatable --}}
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
    {{-- serch select2 select input fild --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
      .time-picker {
        z-index: 9999;
        position: absolute;
        display: inline-block;
        padding: 10px;
        background: #eeeeee;
        border-radius: 6px;
      }

      .time-picker__select {
        z-index: 9999;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        outline: none;
        text-align: center;
        border: 1px solid #dddddd;
        border-radius: 6px;
        padding: 6px 10px;
        background: #ffffff;
        cursor: pointer;
        font-family: 'Heebo', sans-serif;
      }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto">

                      @auth
                        @if (Auth::user()->role==1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">{{ __('Admin Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('bus.counter') }}">{{ __('Bus Counter') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('booking.history') }}">{{ __('Booking History') }}</a>
                        </li>
                      @elseif (Auth::user()->role==2)
                        {{-- @if (Auth::user()->email_verified_at=="")

                          @else --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer/home') }}">{{ __('Customer Home') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer_show/counter') }}">{{ __('Purchase Ticket') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('ticket/information') }}">{{ __('Ticket Information') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer/history') }}">{{ __('Ticket History') }}</a>
                            </li>
                        {{-- @endif --}}

                        @elseif (Auth::user()->role==3)
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('customer/home') }}">{{ __('Customer Home') }}</a>
                          </li>
                       @endif
                      @endauth


                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                  <a class="nav-link" href="{{ route('user.register') }}">User Register</a>
                            </li>

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else

                            <li class="nav-item dropdown">

                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                                  <img style="border-radius: 50%;" width="50" src="{{  asset('profile_photo') }}/{{ Auth::User()->photo }}" alt="">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  {{-- @if (Auth::user()->email_verified_at=="")
                                    @else --}}
                                  <a class="dropdown-item" href="{{ url('user/setting') }}">Profile</a>

                                  {{-- @endif --}}

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>


                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

        </main>
    </div>
      <script src="https://kit.fontawesome.com/e2ac29273e.js"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @yield('javascript_content')
</body>
</html>
