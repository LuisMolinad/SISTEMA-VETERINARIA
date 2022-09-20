@extends('app')

@section('titulo')
    CREAR USUARIO
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">CREAR USUARIO</h1>
@endsection

@section('content')

    {{-- Manejador de Errores que muestra aquellos que no estan llenos --}}
    @if ($errors->any())
        <div class="alert alert-dark alert-dismissible fade show" role="alert">
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
    {{-- {!! Form::open(['route' => 'usuarios.store', 'method' => 'POST']) !!} {{route('GestionCirugia.update',$cita->id)}} --}}
    <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nombre</label>
                    {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
                    {{-- {!! Form::text('name', null, ['class' => 'form-control']) !!} --}}
                    <input type="text" class="form-control" id="name" name="name"
                        value=" {{ old('name') }} "required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    {{-- {!! Form::text('email', null, ['class' => 'form-control']) !!} --}}
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    {{-- {!! Form::password('password', ['class' => 'form-control']) !!} --}}
                    <input type="password" class="form-control" id="password" name="password"
                        value=" {{ old('password') }} " required>
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm-password">Confirmar Password</label>
                    {{-- {!! Form::password('confirm-password', ['class' => 'form-control']) !!} --}}
                    <input type="password" class="form-control" id="confirm-password" name="confirm-password"
                        value="{{ old('confirm-password') }}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Roles</label>
                    {!! Form::select('roles[]', $roles, [], ['class' => 'form-control']) !!}

                </div>

            </div>
            @can('crear-Usuarios')
                <button type="submit"class="btn btn-primary">Guardar</button>
            @endcan
        </div>
    </form>
    {{-- {!! Form::close() !!} --}}



@endsection


@section('js')
@endsection
