<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
<link rel="stylesheet" href="css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
               
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
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
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
        
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/hotel') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                <br>
            @endif

            <div class="content">
              <br>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                               {{-- if user id is 1 then he/she is admin --}}                
                            <div class="card" style="margin-top:40px">
                                <div class="card-header"><b>All Hotels  </b></div>
                                <div class="card-body">
                                <div class="row">
                                    @if (count($hotels)>0)
                                        @foreach ($hotels as $hotel)
                                   <div class="col-md-4">
                                        <div class="card" style="width: 18rem;">
                                      <img class="card-img-top" src="{{ asset('/storage/images/'.$hotel->image)   }}" alt="Card image cap">
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $hotel->title }}</h5>
                                     <p class="card-text">{{ substr($hotel->description,0,35)}}..</p>
                                        <a href="#" class="btn btn-primary">Hotel Details</a>
                                      </div>
                                    </div>
                                 </div>
                                @endforeach
                                    @else
                                        <h3>No hotel Available right now!</h3>
                                @endif
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
 

    </body>
</html>
