@extends('app')

@section('titulo')
Nueva vacuna
@endsection

@section('header')
    <h1>Nuevo vacuna</h1>
@endsection

@section('content')

<div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la vacuna:</label>
                <input type="text" class="form-control" id="inputNombreVacuna" placeholder="Ingrese el nombre de la vacuna">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Descripción vacuna:</label>
                <input type="text" class="form-control" id="inputDescripcionVacuna" placeholder="Ingrese la descripción de la vacuna">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Tiempo entre dosis (días):</label>
                <input type="number" class="form-control" id="inputTiempo" placeholder="Ingrese el tiempo entre dosis">
            </div class="col-md-4 col-md-offset-4">
            <button type="submit" class="btn btn-success mb-2">Guardar</button>
        </form>
    </div>
@endsection