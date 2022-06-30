<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!--meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"-->

    <!-- CSRF Token -->
    <!--meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title-->

    <!-- Scripts -->
    <!--script src="{{ asset('js/app.js') }}" defer></script-->

    <!-- Fonts -->
    <!--link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"-->

    <!-- Styles -->
    <!--link href="{{ asset('css/app.css') }}" rel="stylesheet"-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="{{asset('images/logo.jpeg')}}">
    <title>@yield('titulo')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




    <!--Creo este script para poder englobar las url-->
    <script type="text/javascript">
    var baseURL = {!! json_encode(url('/')) !!}
    </script>
    <!--Scrips-->
    <script src="{{asset('js/agenda.js')}}" defer></script>

    <!--CSS Local-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <!--div id="app"-->
        <!--nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm"-->
        <nav class="navbar navbar-expand-lg navbar-dark ">

            <!--div class="container"-->
                <a class="navbar-brand" href="#"><img class="logo-navbar" src="{{asset('images/logo.jpeg')}}"  alt="Logo de la veterinaria"></a>

                <!--a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a-->
                <h3 style="color:RGB(255,255,255)" class="">Sistema clínico veterinario Pet's Paradise</h3>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <!--ul class="navbar-nav me-auto">

                    </ul-->

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))

                                <!--li class="nav-item active" style="padding: 0px 30px 0px ">
                                    <h3 style="color:RGB(255,255,255)">Sistema clínico veterinario Pet's Paradise</h3>
                                </li-->
                                <li class="nav-item active " style="padding: 0px 30px 0px">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                                <!--a href="{{ route('login') }}"><button type="button" class="btn btn-primary">{{ __('Iniciar sesión') }}</button></a-->

                                </li>
                            <!--a href="{{ route('login') }}"><button type="button" class="btn btn-primary">{{ __('Iniciar sesión') }}</button></a-->

                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item active" style="padding: 0px 30px 0px">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                    <!--a href="{{ route('register') }}"><button type="button" class="btn btn-primary">{{ __('Registrarse') }}</button></a-->
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown active">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            <!--/div-->
        </nav>

        <main>
            @yield('content')
        </main>
    <!--/div-->
</body>
</html>
