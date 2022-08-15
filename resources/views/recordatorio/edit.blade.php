@extends('app')

@section('titulo')
Editar recordatorio
@endsection

@section('librerias')
<!-- Cualquier duda o comentario comunicarse con Rosalio -->
    <!--CSS para recordatorios -->
        <link rel="stylesheet" href="{{asset('css/recordatorio.css')}}">
    <!--Fin del CSS para recordatorios -->
    <!--JS para recordatorios -->
        <script src=" {{asset('js/recordatorio.js')}} "></script>
    <!--Fin del JS para recordatorios -->
<!-- Cualquier duda o comentario comunicarse con Rosalio -->
@endsection

@section('header')
<h1 class="header">Editar recordatorio</h1>
@endsection

@section('content')
<div class="container">
    <form action="{{url('/recordatorio/'.$informacion['recordatorio']->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
        @csrf
        {{method_field('PATCH')}}
     <fieldset class="fieldset fieldset-no-linea">
        <br>
        <center> <h5>Datos generales de la mascota</h5> </center>
        <br>
        @foreach ($informacion['mascota'] as $mascota)
        <div class="form-row" >
            <div class="form-group col-md-6">

            <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                <input type="text" class="form-control" name="idmascota" id="IDMASCOTA" value = "{{$mascota->idMascota}}" readonly="readonly">

                    <strong> <label for="inputRazaMascota">RAZA</label></strong>
                <input type="text" class="form-control" id="inputRazaMascota" value="{{$mascota->razaMascota}}" readonly="readonly">
            </div>
            <div class="form-group col-md-6">
                <strong>  <label for="inputNombreMascota">Mascota</label></strong>

                <input type="text" class="form-control" id="inputNombreMascota" name = "title" value="{{$mascota->nombreMascota}}" readonly="readonly">

                <strong>  <label for="inputSexoMascota" >Sexo</label></strong>
                <input type="text" class="form-control" id="inputSexoMascota" value="{{$mascota->sexoMascota}}" style="width: 180px;" readonly="readonly">
            </div>

            <div class="invisible">
                <strong> <label for="IDMASCOTA">ID</label></strong>
                <input type="text" class="form-control" id="IDMASCOTA" name="mascota_id" value = "{{$mascota->id}}" readonly="readonly">
            </div>
        </div>
        @endforeach

            <center> <h5>Datos de la cita</h5> </center>
            <br>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong>   <label for="ConceptoCirugia" style="color:black">Concepto de la cita</label></strong>
                    <textarea class="form-control" id="ConceptoCirugia" name="ConceptoCirugia" rows="2" maxlength="100" onchange="actualizar_mensaje_al_crear()" required>{{$informacion['recordatorio']->concepto}}</textarea>
                
                    <div class="invalid-feedback">
                        Por favor ingrese información sobre el concepto del recordatorio
                    </div>
                    <div class="valid-feedback">
                        Dato válido sobre concepto de recordatorio
                    </div>
                
                </div>


                <div class="form-group col-md-6">
                    <strong>   <label for="inputFechaCirugia" style="color:black">Fecha de la cita</label></strong>
                    <input class="form-control" type="datetime-local" name="start" value="<?php
                            echo date("Y-m-d\TH:i", strtotime($informacion['recordatorio']->fecha));
                        ?>" id="fechaHoraCitaCirugia" onchange="actualizar_mensaje_al_crear()" required>

                    <div class="valid-feedback">
                        Fecha correcta
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <strong>   <label for="" style="color:black">Telefono recordatorio</label></strong>
                    <input class="form-control" type="tel" name="telefono" value="{{$informacion['recordatorio']->telefono}}" id="telefono" required>

                    <div class="valid-feedback">
                        Telefono correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese un telefono válido
                    </div>
                </div>
            </div>

            <br>
            <center><h5>Recordatorio</h5></center>
            <br>
            <section class="recordatorio_crear_seccion">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong>   <label for="concepto" style="color:black">Anticipacion:</label></strong>
                        <select name="dias_de_anticipacion" class="form-control" id="dias_de_anticipacion" onchange="actualizar_mensaje_al_crear();" onclick="actualizar_mensaje_al_crear_vacuna()">
                            <option 
                            <?php
                                if($informacion['recordatorio']->dias_de_anticipacion == 2) {echo 'selected';}
                            ?> 
                                value="2">2 dias de anticipacion</option>
                            <option 
                            <?php
                                if($informacion['recordatorio']->dias_de_anticipacion == 3) {echo 'selected';}
                            ?> 
                            value="3">3 dias de anticipacion</option>
                            <option 
                            <?php
                                if($informacion['recordatorio']->dias_de_anticipacion == 1) {echo 'selected';}
                            ?> 
                            value="1">1 dias de anticipacion</option>
                        </select>
                        <div class="invalid-feedback"> <!--Validacion -->
                            Por favor ingrese información sobre el concepto de cirugía
                        </div>
                        <div class="valid-feedback">
                            Dato válido sobre concepto de cirugía
                        </div> <!-- Fin de la validacion -->
                    </div>

                    <div class="form-group col-md-6">
                        <strong>   <label style="color:black">Pre visualizacion del mensaje</label></strong>
                        <div id="mensaje-recordatorio">
                        </div>
                    </div>
                </div>
            </section>

            <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary mb-2">Editar</button>    
    </form>
</div>
@endsection


@section('js')
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
