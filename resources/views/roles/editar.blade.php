@extends('app')

@section('titulo')
    EDITAR ROLES
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
    {{--  --}}

    <form action="{{ route('roles.update', $role->id) }}" method="POST">
        {{-- @csrf --}}
        @csrf
        {{ method_field('PATCH') }}
        <div class="container">

            <div class="form-group col-md-6">
                <label for="name">Nombre del Rol</label>
                {{-- Las variables deben ir exactamente como se reciben en el controlador --}}
                {{-- {!! Form::text('name', null, ['class' => 'form-control']) !!} --}}
                <input class="form-control" type="text" name="name" id="name" value="{{ $role->name }}">
            </div>
            <div class="table-responsive">
                <label for="table">Permisos para este Rol:</label>
                <table class="table w-auto">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Permisos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permission as $value)
                            <tr>
                                <td> <input type="checkbox" name="permission[]" class="name" value="{{ $value->id }} "
                                        @if (in_array($value->id, $rolePermissions) == true) checked @endif></td>
                                <td> {{ $value->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>


            <button type="submit"class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection


@section('js')
@endsection
