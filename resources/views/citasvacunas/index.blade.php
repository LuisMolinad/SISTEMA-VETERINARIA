@extends('app')

@section('titulo')
Actas de defunción
@endsection

@section('header')
<br>
<div class="container">
    <h2>Gestionar citas de Vacunación</h2>
</div>
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
            <!-- $mascota->propietario(es el nombre del metodo que esta en el model que define la relacion)->nombrePropietario(el nombre de la columna en la bd)-->
        <tbody>
            @foreach ( $mascotas as $mascota )

                    <tr>
                        <th scope="id">{{$mascota->idMascota}}</th>
                        <td id="nombre mascota">{{$mascota->nombreMascota}}</td>
                        <td id="nombre duenio">{{$mascota->propietario->nombrePropietario }}</td>
                        <td id="telefono duenio">{{$mascota->propietario->telefonoPropietario}}</td>
                        <td id="direccion  duenio">{{$mascota->propietario->direccionPropietario}}</td>
                        <td>
                            <a role="button" class="btn btn-success" href="{{ url('citasvacuna/create') }}">Crear</a>
                            <button type="button" class="btn btn-warning">Editar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>

            @endforeach
            <tr>
            </tr>
        </tbody>
    </table>
</div>

@endsection
