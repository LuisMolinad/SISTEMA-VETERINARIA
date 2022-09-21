@extends('app')

@section('titulo')
    CREAR ROLES
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{-- Tablas --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.css">
@endsection

@section('header')
    <h1 class="header">CREAR ROLES</h1>
@endsection

@section('content')
    {{-- Manejador de Errores que muestra aquellos que no estan llenos --}}
    @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show"role="alert">
            <strong>¡Revise los campos!</strong>
            @foreach ($errors->all() as $error)
                <span class="badge badge-danger">{{ $error }}</span>
            @endforeach
            <button type="button"class="close"data-dismiss="alert"aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    {{-- El formulario siguiente se ha hecho con el uso de la libreria HTML COLLECTIVE
   Su funcion principal es facilitar la creacion de formularios de envio de alguna variable
   Para mas informacion revisar la docunentacion oficial --}}
    {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}
    <div class="container">

        <div class="form-group col-md-6">
            <label for="name">Nombre del Rol</label>
            {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div>
            <label for="email">Permisos para este Rol:</label>
            <table data-toggle="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Permisos</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($permission as $value)
                        <tr>
                            <td> {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }} </td>
                            <td> {{ $value->name }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </div>
        <div class="container">
            @can('crear-rol')
                <button type="submit"class="btn btn-primary">Guardar</button>
            @endcan
        </div>
    </div>
    {!! Form::close() !!}

@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/bootstrap-table@1.21.0/dist/bootstrap-table.min.js"></script>
@endsection
