@extends('app')

@section('titulo')
    ROLES
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">ROLES</h1>
@endsection

@section('content')
    <div class="table-responsive-sm container-fluid contenedor">
        <table class="table table-striped" id="citaVacuna">
            <thead class="table-dark table-header">
                <tr>
                    <th scope="col">ROL</th>
                    <th scope="col">ACCIONES</th>
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
                        <td id="nombreRol">{{ $role->name }}</td>
                        <td>
                            @can('editar-rol')
                                <a class="btn btn-warning" href="{{ route('roles.edit', $role->id) }}">Editar</a>
                            @endcan
                            {{-- El formulario siguiente se ha hecho con el uso de la libreria HTML COLLECTIVE
                        Su funcion principal es facilitar la creacion de formularios de envio de alguna variable
                        Para mas informacion revisar la docunentacion oficial --}}
                            @can('borrar-rol')
                                {!! Form::open([
                                    'method' => 'DELETE',
                                    'route' => ['roles.destroy', $role->id],
                                    'style' => 'display:inline',
                                ]) !!}
                                {{-- Este carga el boton --}}
                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('js')
@endsection
