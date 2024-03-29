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

    {{-- El formulario siguiente se ha hecho con el uso de la libreria HTML COLLECTIVE
    Su funcion principal es facilitar la creacion de formularios de envio de alguna variable
    Para mas informacion revisar la docunentacion oficial --}}
    {!! Form::model($user, ['method' => 'PUT', 'route' => ['usuarios.update', $user->id]]) !!}
    <div class="container">
        {{-- @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif --}}
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
                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control']) !!}
            </div>
        </div>

        @can('editar-Usuarios')
            <button type="submit"class="btn btn-primary">Guardar</button>
            {!! Form::close() !!}
        @endcan
        {{-- <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="form-group col-md-6" style="display: none;">
                <label for="email">E-mail</label>
                <input type="text" id="email" name="email" value="{{ $usuario->email }}">
            </div>
            <button type="submit"
                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
        </form> --}}


    </div>




@endsection


@section('js')
@endsection
