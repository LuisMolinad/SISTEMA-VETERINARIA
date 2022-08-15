<nav class="navbar navbar-expand-lg navbar-dark ">
    <a class="navbar-brand" href="#"><img class="logo-navbar" src="{{ asset('images/logo.jpeg') }}"
            alt="Logo de la veterinaria"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active active">
                <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('citaVacuna.index') }}">Citas para vacuna</a>
                    <a class="dropdown-item" href="/citacirugia">Citas para cirugia</a>
                    <a class="dropdown-item" href="/citaLimpiezaDental">Citas para limpieza dental</a>
                </div>
            </li>

            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Registros clinicos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/propietario">Propietario</a>
                    <a class="dropdown-item" href="/mascota">Mascota</a>
                    <a class="dropdown-item" href="/expediente">Expediente</a>
                </div>
            </li>

            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Actas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('defuncion.index') }}">Defuncion</a>
                </div>
            </li>
            <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Recursos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/vacuna">Vacunas</a>
                    <a class="dropdown-item" href="/tiposervicio">Servicios</a>
                </div>
            </li>

        </ul>
        <ul class="navbar-nav ml-auto">
            {{-- Si inicio sesion y el usuario tiene permiso de ver el rol puede ver el dropdown
                TODO: ESTA FUNCIONALIDAD DEL IF AUN SIGUE EN BETA --}}
            @if (auth()->user()->can('ver-rol'))
                <li class="nav-item active dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bienvenido, {{ auth()->user()->name }}
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item " href="#" data-id="{{ \Auth::id() }}">
                        <i class="fa fa-user"></i>Editar Perfil</a> --}}
                        <a class="dropdown-item" href="{{ route('usuarios.index') }}"> Nuevo Usuario</a>
                        <a class="dropdown-item" href="{{ route('roles.index') }}"> Roles</a>
                        {{-- Posible nueva sección de cambio de contraseña y perfil de usuario
                        <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}"><i class="fa fa-user"></i>Edit Profile</a>
                        <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Change Password</a> --}}
                        {{-- <a class="dropdown-item " data-toggle="modal" data-target="#changePasswordModal" href="#"
                        data-id="{{ \Auth::id() }}"><i class="fa fa-lock"> </i>Cambiar Contraseña</a> --}}
                    </div>

                </li>
            @else
                {{-- de lo contrario solamente vera su nombre --}}
                <li class="nav-item active">
                    <a class="nav-link" href="#" id="navbarDropdown">
                        Bienvenido, {{ auth()->user()->name }}
                    </a>
                </li>
            @endif
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button type="button"
                    class="btn btn-danger">Cerrar Sesion</button></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
    </div>
</nav>
