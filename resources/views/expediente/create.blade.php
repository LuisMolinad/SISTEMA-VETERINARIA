@extends('app')

@section('titulo')
CREAR EXPEDIENTE
@endsection


@section('header')
    <h1 class="header">CREAR EXPEDIENTE</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/expediente')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <fieldset class="fieldset">
            <legend class="legend">Expediente</legend>
                <div class="form-group">
                    <label for="mascota_id">Codigo mascota</label>
                    <input type="text" maxlength="15" class="form-control" id="mascota_id" name="mascota_id" value="{{$mascota->id}}" readonly>
                </div>

                <div class="form-group">
                    <label for="causaFallecimiento">Causa de fallecimiento</label>
                    <input type="text" maxlength="30" class="form-control" id="causaFallecimiento" name="causaFallecimiento" placeholder="Causa de fallecimiento de la mascota" required>
                </div>

                <div class="form-group">
                    <label for="fallecidoExpediente">Estado del animal</label>
                    <select class="form-control" id="fallecidoExpediente" name="fallecidoExpediente">
                        <option selected>Fallecido</option>
                        <option>Vivo</option>
                    </select>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Crear expediente</button>
        </form>
    </div>

@endsection