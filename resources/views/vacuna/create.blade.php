@extends('app')

@section('titulo')
Nueva vacuna
@endsection

@section('header')
    <h1 class="header">Nuevo vacuna</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/vacuna')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="fieldset">
            <legend class="legend">Vacuna</legend>
                <div class="form-group">
                    <label for="nombreVacuna">Nombre de la vacuna</label>
                    <input type="text" maxlength="20" class="form-control" id="nombreVacuna" name="nombreVacuna" placeholder="Ingrese el nombre de la vacuna" required>
                </div>

                <div class="form-group">
                    <label for="descripcionVacuna">Descripción de la vacuna</label>
                    <input type="text" maxlength="50" class="form-control" id="descripcionVacuna" name="descripcionVacuna" placeholder="Ingrese una descripción de la vacuna" required>
                </div>

                <div class="form-group">
                    <label for="tiempoEntreDosisDia">Tiempo entre dósis</label>
                    <input type="number" class="form-control" id="tiempoEntreDosisDia" name="tiempoEntreDosisDia" placeholder="Ingrese el tiempo entre dosis de la vacuna en días" required>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Crear</button>
        </form>
    </div>
@endsection