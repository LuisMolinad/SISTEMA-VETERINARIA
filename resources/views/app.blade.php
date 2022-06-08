<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>@yield('titulo')</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.0.0-alpha.1/axios.js" integrity="sha512-uplugzeh2/XrRr7RgSloGLHjFV0b4FqUtbT5t9Sa/XcilDr1M3+88u/c+mw6+HepH7M2C5EVmahySsyilVHI/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/locales-all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.6.0/main.css">

    <!--Creo este script para poder englobar las url-->
    <script type="text/javascript">
        var baseURL = {!! json_encode(url('/')) !!}
    </script>

     <!--Scrips-->
 <script src="{{asset('js/agenda.js')}}" defer></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark "  style="background-color: #00a00d;">
    <a class="navbar-brand" href="#">Logo veterinaria</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <!-- ">Citas para vacuna</a>-->
               <a class="dropdown-item" href="{{ url('citasvacuna') }}">Citas para vacuna</a>
                <a class="dropdown-item" href="/listaCirugia">Citas para cirugia</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gestionar_expediente">Expediente</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Cirugia</a>
                <a class="dropdown-item" href="{{ route('defuncion.index') }}">Defuncion</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/gestionar_vacunas">Vacunas</a>
                <a class="dropdown-item" href="/gestionar_servicios">Servicios</a>
                </div>
            </li>
        </ul>
        <a href="#"><button type="button" class="btn btn-danger">Cerrar Sesion</button></a>
    </div>
    </nav>

    <header>
    @yield('header')
    </header>

    <main>
    @yield('content')
    </main>
</body>
    <script type="text/javascript">
        $('.date').datepicker({
        format: 'mm-dd-yyyy'
        });
    </script>

    <!--Date picker-->
    <!--
        <input class="date form-control" type="text" readonly="readonly">
    -->
</html>
