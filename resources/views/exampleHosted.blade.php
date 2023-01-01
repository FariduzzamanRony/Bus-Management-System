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

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 m-auto">
        <div class="main" style="background-color: #e0006c!important;text-align:center;color:#fff; padding;font width:700;padding:30px">
          <h3>ID : {{ session('insert_id') }}</h3>
            <h4>
                <span >{{ucfirst(App\Sub_counter::find(session('from_station'))->sub_counter)  }} To
           {{ session('to_station') }}</span>
            </h4>
        </div>
            <ul class="list-group mb-3">


                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Ticket Price</h6>
                        <small><strong>Bus Name: {{ session('bus_name') }}</strong></small>
                    </div>
                    <span class="text-muted">{{ session('class_price') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Ticket Quantity</h6>
                        <small><strong> {{ session('bus_class') }}</strong></small>
                    </div>
                    <span class="text-muted">{{ session('quantity_ticket') }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (BDT)</span>
                    <strong>{{session('quantity_ticket')*session('class_price')}} TK</strong>
                </li>
            </ul>
            <form action="{{ url('/pay') }}" method="POST" class="needs-validation">
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />
                <div class="row">
                </div>


                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay</button>
            </form>
        </div>


    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2019 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</html>
