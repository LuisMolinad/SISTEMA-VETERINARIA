@extends('app')

@section('titulo')
EDITAR PROPIETARIO
@endsection


@section('header')
    <h1 class="header">EDITAR PROPIETARIO</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/propietario/'.$propietario->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
            <legend class="legend">Propietario</legend>
                <div class="form-group">
                    <label for="nombrePropietario">Nombre del dueño</label>
                    <input type="text" maxlength="30" class="form-control" id="nombrePropietario" name="nombrePropietario" placeholder="Ingrese el nombre del dueño de la mascota" value="{{$propietario->nombrePropietario}}">
                </div>

                <div class="form-group">
                    <label for="telefonoPropietario">Número de teléfono</label>
                    <input type="tel" maxlength="8" class="form-control" id="telefonoPropietario" name="telefonoPropietario" placeholder="Ingrese el número de teléfono del dueño de la mascota" value="{{$propietario->telefonoPropietario}}">
                </div>

                <div class="form-group">
                    <label for="direccionPropietario">Dirección</label>
                    <input type="text" maxlength="30" class="form-control" id="direccionPropietario" name="direccionPropietario" placeholder="Ingrese la dirección del dueño de la mascota" value="{{$propietario->direccionPropietario}}">
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Editar</button>
            <a href="/propietario"><button type="button" class="btn btn-primary">Inicio</button></a>
        </form>
    </div>

@endsection