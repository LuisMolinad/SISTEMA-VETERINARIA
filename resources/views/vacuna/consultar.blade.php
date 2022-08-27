@extends('app')

@section('titulo')
Consultar Vacuna
@endsection

@section('header')
    <h1 class="header">Consultar vacuna</h1>
@endsection

@section('content')
<div class="container">
    <fieldset class="fieldset">
        <legend class="legend"><strong>Tipo de vacuna</strong></legend>
        <div class="form-group">
            <label for="nombreVacuna"><strong>Nombre de la vacuna</strong></label>
            <br>
            <label>{{$vacuna->nombreVacuna}}</label>
        </div>
        <div class="form-group">
            <label for="descripcionVacuna"><strong>Descripción de la vacuna</strong></label>
            <br>
            <label>{{$vacuna->descripcionVacuna}}</label>
        </div>
        <div class="form-group">
            <label for="tiempoEntreDosisDia"><strong>Tiempo entre dosis en dias</strong></label>
            <br>
            <label>{{$vacuna->tiempoEntreDosisDia}}</label>
        </div>
    </fieldset>
    <a href="/vacuna"><button type="button" class="btn btn-secondary">Regresar</button></a>
</div>
@endsection