@extends('app')

@section('titulo')
Crear expediente
@endsection

@section('header')
    <h1>EDITAR EXPEDIENTE MASCOTA</h1>
@endsection

@section('content')

<div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Código de la mascota</label>
                <input type="text" class="form-control" id="inputCodigoMascota" placeholder="Código de la mascota" readonly="readonly">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre de la mascota</label>
                <input type="text" class="form-control" id="inputNombreMascota" placeholder="Ingrese el nombre de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Raza</label>
                <input type="text" class="form-control" id="inputRazaMascota" placeholder="Ingrese la raza de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Color</label>
                <input type="text" class="form-control" id="inputColorMascota" placeholder="Ingrese el color de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Sexo</label>
                <select class="form-control" id="inputSexoMascota">
                    <option>Seleccionar sexo</option>
                    <option>Hembra</option>
                    <option>Varón</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Especie</label>
                <select class="form-control" id="inputSexoMascota">
                    <option>Seleccionar especie</option>
                    <option>Perro</option>
                    <option>Gato</option>
                    <option>Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre del dueño</label>
                <input type="text" class="form-control" id="inputDueñoMascota" placeholder="Ingrese el nombre del dueño de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Número de teléfono</label>
                <input type="text" class="form-control" id="inputTelefonoMascota" placeholder="Ingrese el número de teléfono del dueño de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Dirección</label>
                <input type="text" class="form-control" id="inputDireccionMascota" placeholder="Ingrese la dirección del dueño de la mascota">
            </div>
            <button type="submit" class="btn btn-success mb-2">Editar</button>
        </form>
    </div>

@endsection