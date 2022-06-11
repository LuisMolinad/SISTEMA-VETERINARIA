@extends('app')

@section('titulo')
Crear expediente
@endsection

@section('librerias')
    <!--Date picker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="{{secure_asset('js/datepicker.js')}}" defer></script>
@endsection

@section('header')
    <h1 class="header">CREAR EXPEDIENTE MASCOTA</h1>
@endsection

@section('content')

<div class="container">
        <form>
            <fieldset class="fieldset">
                <legend class="legend">Propietario</legend>
                <div class="form-group">
                    <label for="nombrePropietario">Nombre del dueño</label>
                    <input type="text" class="form-control" id="nombrePropietario" placeholder="Ingrese el nombre del dueño de la mascota">
                </div>
                <div class="form-group">
                    <label for="telefonoPropietario">Número de teléfono</label>
                    <input type="text" class="form-control" id="telefonoPropietario" placeholder="Ingrese el número de teléfono del dueño de la mascota">
                </div>
                <div class="form-group">
                    <label for="direccionPropietario">Dirección</label>
                    <input type="text" class="form-control" id="direccionPropietario" placeholder="Ingrese la dirección del dueño de la mascota">
                </div>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="legend">Mascota</legend>
                <div class="form-group">
                    <label for="codigoMascota">Código de la mascota</label>
                    <input type="text" class="form-control" id="codigoMascota" placeholder="Ingrese el código de la mascota">
                </div>
                <div class="form-group">
                    <label for="nombreMascota">Nombre de la mascota</label>
                    <input type="text" class="form-control" id="nombreMascota" placeholder="Ingrese el nombre de la mascota">
                </div>
                <div class="form-group">
                    <label for="razaMascota">Raza</label>
                    <input type="text" class="form-control" id="razaMascota" placeholder="Ingrese la raza de la mascota">
                </div>
                <div class="form-group">
                    <label for="especieMascota">Especie</label>
                    <select class="form-control" id="especieMascota">
                        <option selected>Perro</option>
                        <option>Gato</option>
                        <option>Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="colorMascota">Color</label>
                    <input type="text" class="form-control" id="colorMascota" placeholder="Ingrese el color de la mascota">
                </div>
                <div class="form-group">
                    <label for="sexoMascota">Sexo</label>
                    <select class="form-control" id="sexoMascota">
                        <option>Hembra</option>
                        <option selected>Varón</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de nacimiento</label>
                    <input id="fechaNacimiento" class="date form-control" type="text" readonly="readonly">
                </div>
                <div class="form-group">
                    <label for="caracteristicasMascota">Caracteristicas especiales</label>
                    <textarea class="form-control" id="caracteristicasMascota" rows="3" maxlength="100"></textarea>
                </div>
            </fieldset>
            <fieldset class="fieldset">
                <legend class="legend">Expediente</legend>

            </fieldset>
            <button type="submit" class="btn btn-success mb-2">Crear</button>
        </form>
    </div>

@endsection
