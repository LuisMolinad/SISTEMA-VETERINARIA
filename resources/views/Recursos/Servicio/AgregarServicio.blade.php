@extends('app')

@section('titulo')
Nuevo Servicio
@endsection

@section('header')
    <h1>Nuevo servicio veterinario</h1>
@endsection

@section('content')

<div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del servicio:</label>
                <input type="text" class="form-control" id="inputNombreServicio" placeholder="Ingrese el nombre del servicio">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Descripción del Servicio</label>
                <input type="text" class="form-control" id="inputDescripcionServicio" placeholder="Ingrese la descripción del servicio">
            </div>
            <button type="submit" class="btn btn-success mb-2">Guardar</button>
        </form>
    </div>

@endsection