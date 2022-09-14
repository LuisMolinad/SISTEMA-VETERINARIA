@extends('app')

@section('titulo')
Editar Cita de Limpieza Dental
@endsection

@section('librerias')
<!--CSS para recordatorios -->
<link rel="stylesheet" href="{{ asset('css/recordatorio.css') }}">
<!--JS para recordatorios -->
<script src=" {{ asset('js/recordatorio.js') }} "></script>
@endsection

@section('header')
<br>
<div class="container">
    <h1>Editar cita de Limpieza Dental</h1>
</div>
@endsection

@section('content')
    <div class="container">
        <!--Envio de la información a traves del metodo post-->
        <form action="{{route('citaLimpieza.update', ['idCitaLimpieza'=>$citaDental->id, 'idmascota' => $mascotas->id])}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <fieldset class="fieldset fieldset-no-linea">
                <br>
                <center> <h5>Datos generales de la mascota</h5> </center>
                <br>

                <div class="form-row" >
                    <div class="form-group col-md-6">
    
                    <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                        <input type="text" class="form-control" name="title" id="IDMASCOTA" value = "{{$mascotas->idMascota}}" readonly="readonly">
    
                        <strong> <label for="inputRazaMascota">Raza</label></strong>
                        <input type="text" class="form-control" id="inputRazaMascota" value="{{$mascotas->razaMascota}}" readonly="readonly">
                    </div>
                    <div class="form-group col-md-6">
                        <strong>  <label for="inputNombreMascota">Nombre</label></strong>
    
                        <input type="text" class="form-control" id="inputMascota" name = "nombre_mascota" value="{{$mascotas->nombreMascota}}" readonly="readonly">
    
                        <strong>  <label for="inputSexoMascota">Sexo</label></strong>
                        <input type="text" class="form-control" id="inputSexoMascota" value="{{$mascotas->sexoMascota}}" style="width: 180px;" readonly="readonly">
                    </div>
    
                    <div class="invisible">
                        <strong> <label for="IDMASCOTA">ID</label></strong>
                        <input type="text" class="form-control" id="IDMASCOTA" name="mascota_id" value = "{{$mascotas->id}}" readonly="readonly">
                    </div>
                </div>

           <center> <h5>Datos generales del dueño</h5> </center>
            <div class="form-row" style="background-color:#e1dff4">
                <div class="form-group col-md-6">
                    <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
                <input type="text" class="form-control" id="inputnombreDuenio" value="{{$mascotas->propietario->nombrePropietario }}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                <input type="text" class="form-control" name="telefono" id="inputContactNumber" value="{{$mascotas->propietario->telefonoPropietario}}" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>   <label for="inputDireccion" style="color:black">Dirección</label></strong>
                    <input type="text" class="form-control" id="inputDireccion"  value="{{$mascotas->propietario->direccionPropietario}}" readonly="readonly">
                </div>
            </div>

            <br>
            <center> <h5>Fecha para realizar Limpieza Dental</h5> </center>
    
            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong>   <label for="inputFechaLimpieza" style="color:black">Fecha</label></strong>
                    <input class="form-control" type="datetime-local" name="start" id="fechaHoraCitaLimpieza" 
                    value="{{$citaDental->start}}" onchange="actualizarMensaje_al_crear_limpieza()" required>

                    <div class="valid-feedback">
                        Fecha correcta
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>

                <!--Datos para el calendario-->
                <div class="invisible">
                    <strong> <label for="end">End</label></strong>
                    <input type="text" class="form-control" id="end" name="end" readonly="readonly">
                </div>
            </div>

            
            <div class="form-group d-none">
                <label for=""></label>
                <input type="text"
                  class="form-control" name="groupId" id="groupId" aria-describedby="helpId" value="citasLimpiezaDental">
              </div>

               <!--Esto es para realizar el filtro de limpieza dental en la agenda-->
            <div class="form-group d-none">
                <label for=""></label>
                <input type="text"
                  class="form-control" name="filterLimpiezaDental" id="filterLimpiezaDental" aria-describedby="filterLimpiezaDental" value="citasLimpiezaDental">
              </div>
            
              
       @if($citaDental->recordatorio_id != null)
              <section class="recordatorio_crear_seccion">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <strong> <label for="ConceptoCirugia" style="color:black">Anticipacion:</label></strong>
                        <select name="dias_de_anticipacion" class="form-control" id="dias_de_anticipacion"
                            onchange="actualizarMensaje_al_crear_limpieza();"
                            onclick="actualizarMensaje_al_crear_limpieza();">
                           <!--<option value="0">No, no deseo un recordatorio</option>-->
                           <!--<option value="1">1 dias de anticipacion</option>
                            <option value="2">2 dias de anticipacion</option>
                            <option value="3">3 dias de anticipacion</option> -->

                            <option value="1"
                            @php
                                if($dias_anteriores == 1){
                                    echo 'selected';
                                }
                            @endphp
                            > 1 dia de anticipación</option>

                            <option value="2"
                            @php
                                if($dias_anteriores == 2){
                                    echo 'selected';
                                }
                            @endphp
                            > 2 dias de anticipación</option>

                            <option value="3"
                            @php
                                if($dias_anteriores == 3){
                                    echo 'selected';
                                }
                            @endphp
                            > 3 dias de anticipación</option>

                        </select>
                        <div class="invalid-feedback">
                            <!--Validacion -->
                            Por favor ingrese información sobre la limpieza dental
                        </div>
                        <div class="valid-feedback">
                            Dato válido sobre dia de anticipación
                        </div> <!-- Fin de la validacion -->
                    </div>

                    <div class="form-group col-md-6">
                        <strong> <label style="color:black">Pre visualizacion del mensaje</label></strong>
                        <div id="mensaje-recordatorio">
                            <div id="mensaje-recordatorio-limpieza">
                            </div>
                        </div>
                    </div>
                </section>
              @endif


              <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-primary mb-2">Guardar</button>

            </fieldset>
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

<script>
    $(document).ready(() =>{
        actualizarMensaje_al_crear_limpieza();
    });
</script>

@endsection