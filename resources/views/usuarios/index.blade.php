@extends('app')

@section('titulo')
    GESTIONAR USUARIOS
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
    <div class="table-responsive container-fluid contenedor">
        @include('layouts.notificacion')
        <table class="table table-striped" style="width:100%" id="users">
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
                @can('crear-Usuarios')
                    <a role="button" class="btn btn-success" href="{{ route('usuarios.create') }}">Crear Usuario</a>
                @endcan
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
                        <td id="botones-linea">
                            @can('editar-Usuarios')
                                <a class="btn btn-warning" href="{{ route('usuarios.edit', $usuario->id) }}">Editar</a>
                            @endcan
                            {{-- {!! Form::open([
                                'method' => 'DELETE',
                                'route' => ['usuarios.destroy', $usuario->id],
                                'style' => 'display:inline',
                            ]) !!}
                            {{-- Este carga el boton 
                            {!! Form::submit('Borrar', [
                                'class' => 'btn btn-danger',
                                'onclick' => 'alerta_eliminar_usuario( $usuario->id , $usuario->name );',
                            ]) !!}

                            {!! Form::close() !!} --}}
                            @can('borrar-Usuarios')
                                <form id="EditForm{{ $usuario->id }}"
                                    action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button
                                        onclick="return alerta_eliminar_usuario('{{ $usuario->id }}','{{ $usuario->name }}')"
                                        type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endcan
                            <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <div class="form-group col-md-6" style="display: none;">
                                    <label for="email">E-mail</label>
                                    <input type="text" id="email" name="email" value="{{ $usuario->email }}">
                                </div>
                                <button type="submit" class="btn btn-info">Reenviar enlace de verificación</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#users').DataTable({
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
