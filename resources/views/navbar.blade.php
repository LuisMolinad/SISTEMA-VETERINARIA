<nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="#"><img class="logo-navbar" src="{{asset('images/logo.jpeg')}}"  alt="Logo de la veterinaria"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active active">
                <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('citaVacuna.index') }}">Citas para vacuna</a>
                <a class="dropdown-item" href="/citacirugia">Citas para cirugia</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/expediente">Expediente</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/propietario">Propietario</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/mascota">Mascota</a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('defuncion.index') }}">Defuncion</a>
                </div>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Recursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/vacuna">Vacunas</a>
                <a class="dropdown-item" href="/tiposervicio">Servicios</a>
                </div>
            </li>
        </ul>
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button type="button" class="btn btn-danger">Cerrar Sesion</button></a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
        </form>
    </div>
</nav>
