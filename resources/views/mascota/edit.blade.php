@extends('app')

@section('titulo')
CREAR MASCOTA
@endsection

@section('librerias')
    <!--Date picker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="{{secure_asset('js/datepicker.js')}}" defer></script>
@endsection


@section('header')
    <h1 class="header">CREAR MASCOTA</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/mascota/'.$mascota->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
                <legend class="legend">Mascota</legend>
                <div class="form-group">
                    <label for="idMascota">Código de la mascota</label>
                    <input value="{{$mascota->idMascota}}" type="text" class="form-control" pattern="[A-Z]{1}[0-9]{3}"  id="idMascota" name="idMascota" placeholder="Ingrese el código de la mascota">
                </div>
                <div class="form-group">
                    <label for="propietario_id">Id de el propietario</label>
                    <input value="{{$mascota->propietario_id}}" type="text" class="form-control" id="propietario_id" name="propietario_id" placeholder="Ingrese el id del propietario de la mascota">
                </div>
                <div class="form-group">
                    <label for="nombreMascota">Nombre de la mascota</label>
                    <input value="{{$mascota->nombreMascota}}" type="text" class="form-control" id="nombreMascota" name="nombreMascota" placeholder="Ingrese el nombre de la mascota">
                </div>
                <div class="form-group">
                    <label for="razaMascota">Raza</label>
                    <input value="{{$mascota->razaMascota}}" type="text" class="form-control" id="razaMascota" name="razaMascota" placeholder="Ingrese la raza de la mascota">
                </div>
                <div class="form-group">
                    <label for="especie">Especie</label>
                    <select class="form-control" id="especie" name="especie">
                        <option selected>Perro</option>
                        <option>Gato</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="colorMascota">Color</label>
                    <input value="{{$mascota->colorMascota}}" type="text" class="form-control" id="colorMascota" name="colorMascota" placeholder="Ingrese el color de la mascota">
                </div>
                <div class="form-group">
                    <label for="sexoMascota">Sexo</label>
                    <select class="form-control" id="sexoMascota" name="sexoMascota">
                        <option>Hembra</option>
                        <option selected>Varón</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                    <input value="{{$mascota->fechaNacimiento}}" id="fechaNacimiento" name="fechaNacimiento" class="date form-control" type="text" readonly>
                </div>
                <div class="form-group">
                    <label for="fallecidoMascota">Estado de la mascota</label>
                    <select class="form-control" id="fallecidoMascota" name="fallecidoMascota">
                        <option >Fallecido</option>
                        <option selected>Vivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="caracteristicasEspeciales">Caracteristicas especiales</label>
                    <textarea class="form-control" id="caracteristicasEspeciales" name="caracteristicasEspeciales" rows="3" maxlength="100">{{$mascota->caracteristicasEspeciales}}</textarea>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Editar</button>
        </form>
    </div>

@endsection
