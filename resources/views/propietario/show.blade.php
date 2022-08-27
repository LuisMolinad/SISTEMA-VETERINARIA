@extends('app')

@section('titulo')
Consultar Propietario
@endsection
@section('librerias')
    <link rel="stylesheet" href=" {{asset('css/mascota_consultar.css')}} ">
@endsection
@section('header')
    <h1 class="header">Consultar propietario</h1>
@endsection

@section('content')
{{-- <div class="container"> --}}
<div class="container consultar_mascota">

    {{-- <section class="consultar_mascota_datos"> --}}
    {{-- <fieldset class="fieldset"> --}}
    <section class="caracteristicas_especiales">

        <article>
            <legend class="legend"><strong>Propietario</strong></legend>
            <div class="form-group">
                <label for="nombrePropietario"><strong>Nombre del dueño:</strong></label>
                <br>
                <label>{{$propietario->nombrePropietario}}</label>
            </div>
            <div class="form-group">
                <label for="telefonoPropietario"><strong>Número de teléfono:</strong></label>
                <br>
                <label>{{$propietario->telefonoPropietario}}</label>
            </div>
            <div class="form-group">
                <label for="direccionPropietario"><strong>Dirección:</strong></label>
                <br>
                <label>{{$propietario->direccionPropietario}}</label>
            </div>
        {{-- </fieldset> --}}
        </article>
    </section>

    <section class="caracteristicas_especiales">
        <article>
            <legend class="legend"><strong>Mascotas</strong></legend>
            {{-- <div class="form-group">
                <label for="nombrePropietario"><strong>Nombre del dueño:</strong></label>
                <br>
                <label>{{$propietario->nombrePropietario}}</label>
            </div>
            <div class="form-group">
                <label for="telefonoPropietario"><strong>Número de teléfono:</strong></label>
                <br>
                <label>{{$propietario->telefonoPropietario}}</label>
            </div>
            <div class="form-group">
                <label for="direccionPropietario"><strong>Dirección:</strong></label>
                <br>
                <label>{{$propietario->direccionPropietario}}</label>
            </div> --}}
            @if($mascotas->isEmpty())
                <label style="text-align:center">Este propietario no tiene mascotas asociadas.</label>
            @else
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td><strong>Codigo</strong></td>
                    <td><strong>Nombre</strong></td>
                    <td><strong>Raza</strong></td>
                    <td><strong>Especie</strong></td>
                    </tr>
                </thead>
                <tbody>
                @foreach ($mascotas as $mascota)
                    <tr>
                        <td>{{$mascota->idMascota}}</td>
                        <td>{{$mascota->nombreMascota}}</td>
                        <td>{{$mascota->razaMascota}}</td>
                        <td>{{$mascota->especie}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @endif
        </article>
    </section>

    <a href="/propietario"><button type="button" class="btn btn-secondary">Regresar</button></a>
    <br>
    <br>
</div>
@endsection