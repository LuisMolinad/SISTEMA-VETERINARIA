@extends('app')

@section('titulo')
    GESTIONAR VACUNAS
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- Llamamos al sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Llamamos nuestro documento de sweetalert -->
    <script src="{{ asset('js/eliminar_sweetalert2.js') }}"></script>
@endsection


@section('header')
    <h1 class="header">GESTION DE USUARIOS</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">
        @include('layouts.notificacion')
        <table class="table table-striped" id="citaVacuna">
            <thead class="table-dark table-header">
                <tr>
                    <th style="display:none">ID </th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">E-MAIL</th>
                    <th scope="col">ROL</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <!-- $mascota->propietario(es el nombre del metodo que esta en el model que define la relacion)->nombrePropietario(el nombre de la columna en la bd)-->
            <tbody>
                <a role="button" class="btn btn-success" href="{{ route('usuarios.create') }}">Crear Usuario</a>
                <br>
                <br>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td id="idUsuario"style="display:none">{{ $usuario->id }}</td>
                        <td id="nombreUsuario">{{ $usuario->name }}</td>
                        <td id="emailUsuario">{{ $usuario->email }}</td>
                        <td id="rolUsuario">
                            @if (!empty($usuario->getRoleNames()))
                                @foreach ($usuario->getRoleNames() as $roleName)
                                    {{ $roleName }}
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                            {{-- El formulario siguiente se ha hecho con el uso de la libreria HTML COLLECTIVE
                            Su funcion principal es facilitar la creacion de formularios de envio de alguna variable
                            Para mas informacion revisar la docunentacion oficial --}}
                            {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['usuarios.destroy', $usuario->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {{-- Este carga el boton --}}
                            {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}
                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="form-group col-md-6" style="display: none;">
                                    <label for="email">E-mail</label>
                                    <input type="text" id="email" name="email" value="{{ $usuario->email }}">
                                </div>
                                <button type="submit" class="btn btn-outline-info">Reenviar enlace de verificación</button>
                            </form>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-end">
            {{-- Paginacion con php --}}
            {!! $usuarios->links() !!}
        </div>
    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#vacuna').DataTable({
                "lengthMenu": [
                    [5, 10, 25, -1],
                    [5, 10, 25, "Todos"]
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ records por página",
                    "zeroRecords": "No se encuentran datos relacionados found - ",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles ",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    'search': 'Buscar',
                    'paginate': {
                        'first': 'Primero',
                        'last': 'Ultimo',
                        'next': 'Siguiente',
                        'previous': 'Anterior',
                    },

                },
            });
        });
    </script>
@endsection
