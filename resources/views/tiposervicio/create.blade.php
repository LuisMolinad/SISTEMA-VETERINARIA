@extends('app')

@section('titulo')
Nuevo Servicio
@endsection

@section('header')
    <h1 class="header">Nuevo servicio veterinario</h1>
@endsection

@section('content')
<div class="container">
        <form action="{{url('/tiposervicio')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="fieldset">
            <legend class="legend">Tipo de servicio</legend>
                <div class="form-group">
                    <label for="nombreServicio">Nombre del servicio</label>
                    <input type="text" maxlength="20" class="form-control" id="nombreServicio" name="nombreServicio" placeholder="Ingrese el nombre del servicio">
                </div>

                <div class="form-group">
                    <label for="descripcionServicio">Descripción del servicio</label>
                    <input type="text" maxlength="50" class="form-control" id="descripcionServicio" name="descripcionServicio" placeholder="Ingrese una descripción del servicio">
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Crear</button>
        </form>
    </div>
@endsection