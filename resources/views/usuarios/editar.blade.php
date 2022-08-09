@extends('app')

@section('titulo')
    EDITAR USUARIO
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">EDITAR USUARIO</h1>
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
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['usuarios.update', $user->id]]) !!}
    <div class="container">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Nombre</label>
                {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}

            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail</label>
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="password">Password</label>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="confirm-password">Confirmar Password</label>
                {!! Form::password('confirm-password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6">
                <label for="">Roles</label>
                {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}
            </div>
        </div>


        <button type="submit"class="btn btn-primary">Guardar</button>
        {!! Form::close() !!}
    </div>




@endsection


@section('js')
@endsection
