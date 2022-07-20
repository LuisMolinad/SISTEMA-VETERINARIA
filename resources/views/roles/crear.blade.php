@extends('app')

@section('titulo')
    CREAR ROLES
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
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
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre del Rol</label>
                {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-col-md-6">
                <label for="email">Permisos para este Rol:</label>
                <br>
                @foreach ($permission as $value)
                    <label>
                        {{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                        {{ $value->name }}
                    </label>
                @endforeach
            </div>
        </div>
        <button type="submit"class="btn btn-primary">Guardar</button>
    </div>
    {!! Form::close() !!}

@endsection


@section('js')
@endsection
