@extends('app')

@section('titulo')
    ROLES
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
    <h1 class="header">ROLES</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">
        {{-- Notificaciones --}}
        @include('layouts.notificacion')
        <table class="table table-striped" id="roles">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col" style="text-align: center">ROL</th>
                    <th scope="col" style="text-align: center">ACCIONES</th>
                </tr>
            </thead>
            <!-- $mascota->propietario(es el nombre del metodo que esta en el model que define la relacion)->nombrePropietario(el nombre de la columna en la bd)-->
            <tbody>
                @can('crear-rol')
                    <a role="button" class="btn btn-success" href="{{ route('roles.create') }}">Crear Rol</a>
                    <br>
                    <br>
                @endcan
                @foreach ($roles as $role)
                    <tr>
                        {{-- <td id="rolName"style="display:none">{{ $usuario->id }}</td> --}}
                        <td id="nombreRol" style="text-align: center">{{ $role->name }}</td>
                        <td style="text-align: center">
                            @can('editar-rol')
                                <a class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                            @endcan
                            {{-- El formulario siguiente se ha hecho con el uso de la libreria HTML COLLECTIVE
                        Su funcion principal es facilitar la creacion de formularios de envio de alguna variable
                        Para mas informacion revisar la docunentacion oficial --}}
                            @can('borrar-rol')
                                {{-- {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['roles.destroy', $role->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {{-- Este carga el boton 
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!} --}}
                                {{-- <form id="EditForm{{ $usuario->id }}"
                                    action="{{ route('usuarios.destroy', ['usuario' => $usuario->id]) }}" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button
                                        onclick="return alerta_eliminar_usuario('{{ $usuario->id }}','{{ $usuario->name }}')"
                                        type="submit" class="btn btn-danger">Eliminar</button>
                                </form> --}}
                                <form id="EditForm{{ $role->id }}" action="{{ route('roles.destroy', $role->id) }}"
                                    method="post" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button onclick="return alerta_eliminar_role('{{ $role->id }}','{{ $role->name }}')"
                                        type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            @endcan
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
            $('#roles').DataTable({
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
