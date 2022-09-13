@extends('app')

@section('titulo')
    EDITAR ROLES
@endsection

@section('librerias')
    <!--Data tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection

@section('header')
    <h1 class="header">EDITAR ROLES</h1>
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
    {{-- {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update', $role->id]]) !!} --}}
    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        {{-- @csrf --}}
        @csrf
        {{ method_field('PATCH') }}
        <div class="container">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Nombre del Rol</label>
                    {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
                    {{-- {!! Form::text('name', null, ['class' => 'form-control']) !!} --}}
                    <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
                </div>
                <div class="form-col-md-6">
                    <label for="email">Permisos para este Rol:</label>
                    <br>
                    @foreach ($permission as $value)
                        <label>
                            {{-- Compara el array y lo marca como checked si se encuentra en el --}}
                            <input type="checkbox" name="permission[]" class="name" value="{{ $value->id }} "
                                @if (in_array($value->id, $rolePermissions) == true) checked @endif>
                            <label for="">{{ $value->name }}</label>
                        </label>
                    @endforeach
                </div>
            </div>

            <button type="submit"class="btn btn-primary">Guardar</button>
        </div>
    </form>
    {{-- {!! Form::close() !!} --}}

@endsection


@section('js')
@endsection
