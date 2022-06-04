@extends('app')

@section('titulo')
Actas de defunción
@endsection

@section('header')
<br>
<div class="container">
    <h2>Actas de defunción</h2>
</div>
<br>
@endsection

@section('content')
<div class="container">
    <table class="table">
        <thead style="background-color:#FFEFCF">
            <tr>
            <th scope="col">ID Mascota</th>
            <th scope="col">Nombre</th>
            <th scope="col">Dueño</th>
            <th scope="col">Número</th>
            <th scope="col">Dirección</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="id">G####</th>
                <td>Kero</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                    <a role="button" class="btn btn-success" href="{{ route('defuncion.create') }}">Crear</a>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <tr>
            <th scope="id">G####</th>
                <td>Luna</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                    <button type="button" class="btn btn-success">Crear</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <tr>
                <th scope="id">G####</th>
                <td>Kero</td>
                <td>Katya</td>
                <td>60014695</td>
                <td>San Bartolo</td>
                <td>
                    <button type="button" class="btn btn-success">Crear</button>
                    <button type="button" class="btn btn-warning">Editar</button>
                    <button type="button" class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
