@extends('app')

@section('titulo')
Enviar mensaje
@endsection

@section('header')
    <h1 class="header">Enviar mensaje</h1>
@endsection

@section('librerias')
@endsection

@section('content')

@include('layouts.notificacion')

<div class="container">
    <form action="{{url('/recodatorio/enviar/')}}" method="GET" enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="tel" maxlength="8" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el número de teléfono del dueño de la mascota" required>
            <div class="invalid-feedback">
                Por favor ingrese un nombre válido
            </div>
            <div class="valid-feedback">
                Dato válido
            </div>
        </div>

        <div class="form-group">
            <label for="concepto">Concepto</label>
            <input type="text"  class="form-control" id="concepto" name="concepto" placeholder="Ingrese la razon del porque el mensaje" required>
            <div class="invalid-feedback">
                Por favor ingrese un concepto valido
            </div>
            <div class="valid-feedback">
                Dato válido
            </div>
        </div>

        <div class="form-group">
            <label for="nombre_mascota">Nombre de la mascota</label>
            <input type="text"  class="form-control" id="nombre_mascota" name="nombre_mascota" placeholder="Ingrese la razon del porque el mensaje" required>
            <div class="invalid-feedback">
                Por favor ingrese un concepto valido
            </div>
            <div class="valid-feedback">
                Dato válido
            </div>
        </div>

        <label for="fecha" style="color:black">Fecha de la cita</label>
        <input class="form-control" type="datetime-local" name="fecha" id="fecha" required>

        <div class="valid-feedback">
            Fecha correcta
        </div>
        <div class="invalid-feedback">
            Por favor ingrese una fecha válida
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Enviar mensaje</button>
    </form>
</div>
@endsection