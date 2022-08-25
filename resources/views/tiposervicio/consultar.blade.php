@extends('app')

@section('titulo')
Consultar Servicio
@endsection

@section('header')
    <h1 class="header">Consultar tipo de servicio</h1>
@endsection

@section('content')
<div class="container">
    <fieldset class="fieldset">
        <legend class="legend"><strong>Tipo de servicio</strong></legend>
        <div class="form-group">
            <label for="nombreServicio"><strong>Nombre del servicio</strong></label>
            <br>
            <label>{{$tipoServicio->nombreServicio}}</label>
        </div>
        <div class="form-group">
            <label for="descripcionServicio"><strong>Descripción del servicio</strong></label>
            <br>
            <label>{{$tipoServicio->descripcionServicio}}</label>
        </div>
    </fieldset>
    <a href="/tiposervicio"><button type="button" class="btn btn-secondary">Regresar</button></a>
</div>
@endsection