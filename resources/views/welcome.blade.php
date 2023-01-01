<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #e0006c;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
                color:#fff;
            }
            .links{
              margin-top:30px;
            }

            .links > a {
                color: #636b6f;
                background-color:#fff;
                padding: 10px 10px;
                border-radius: 5px;
                margin-left: 50px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif --}}

                          <a href="{{ route('user.register') }}">User Register</a>

                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  Bangladesh Bus Transport
                </div>

                <div class="links">
                    <img width=400; class="img-fluid" src="https://media.istockphoto.com/photos/white-passenger-bus-picture-id135327019?k=20&m=135327019&s=612x612&w=0&h=YJneXYFReSVuKSIFOy5wGIygeLeb1UquX4BWLk-MluI=" alt="">
                </div>
            </div>
        </div>
    </body>
</html>
