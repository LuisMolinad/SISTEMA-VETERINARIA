@extends('app')

@section('titulo')
Crear Cirugia
@endsection

@section('header')
    <h1>CREAR CITA DE CIRUGÍA </h1>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script><script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
@endsection

@section('content')

<div class="container">
        <form>
        <div id="columna1">
        <h3>Datos generales de la mascota</h3>
            <div class="form-group">
                <label for="exampleFormControlInput1">Código de la mascota</label>
                <input type="text" class="form-control" id="inputCodigoMascota" placeholder="Código de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre</label>
                <input type="text" class="form-control" id="inputNombreMascota" placeholder="Nombre de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Raza</label>
                <input type="text" class="form-control" id="inputRazaMascota" placeholder="Raza de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Sexo</label>
                <input type="text" class="form-control" id="inputSexoMascota" placeholder="Sexo de la mascota">
            </div>
           
            <h3>Datos generales del dueño</h3>
            <div class="form-group">
                <label for="exampleFormControlInput1">Dueño</label>
                <input type="text" class="form-control" id="inputDueñoMascota" placeholder="Nombre del dueño de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Dirección</label>
                <input type="text" class="form-control" id="inputDireccionMascota" placeholder="Dirección del dueño de la mascota">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Teléfono</label>
                <input type="text" class="form-control" id="inputTelefonoMascota" placeholder="Número de teléfono del dueño de la mascota">
            </div>
        <div id="columna2">
        <h3>Concepto de cirugía</h3>
            <div class="form-group">
                        <label for="exampleFormControlInput1">Concepto de cirugía</label>
                        <input type="text" class="form-control" id="inputConceptoCirugia" placeholder="Ingrese el concepto de la cirugía">
            </div>
            <label for="date">Fecha de cita de cirugía</label>
            <input class="date form-control" type="text" readonly="readonly"> 
         <div id="columna3">
         <h3>Recomendaciones preoperatorias</h3>
            <div class="form-group">
                        <label for="exampleFormControlInput1">Recomendaciones preoperatorias</label>
                        <input type="text" class="form-control" id="inputCondicionesPreoperatorias" placeholder="Ingrese las recomendaciones preoperatorias">
            </div>
            <label for="date">Fecha de recordatorio</label>
            <input class="date form-control" type="text" readonly="readonly">  
            <div class="form-group">
                        <label for="exampleFormControlInput1">Mensaje de recordatorio</label>
                        <input type="text" class="form-control" id="inputCondicionesPreoperatorias" placeholder="Ingrese el mensaje de recordatorio">
            </div>
         </div>
            <button type="submit" class="btn btn-success mb-2">Crear</button>
        </form>
    </div>
    </div>
   
@endsection