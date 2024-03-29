@extends('app')

@section('titulo')
Editar cita de cirugía
@endsection

@section('librerias')
 <!-- Cualquier duda o comentario comunicarse con Rosalio -->
    <!--CSS para recordatorios -->
    <link rel="stylesheet" href="{{ asset('css/recordatorio.css') }}">
    <!--Fin del CSS para recordatorios -->
    <!--JS para recordatorios -->
    <script src=" {{ asset('js/recordatorio.js') }} "></script>
    <!--Fin del JS para recordatorios -->
    <!-- Cualquier duda o comentario comunicarse con Rosalio -->
@endsection

@section('header')
<br>
<div class="container">
    <h1>Editar cita de cirugía</h1>
</div>
@endsection
@section('content')
<div class="container">
<form action="{{route('GestionCirugia.update',$cita->id)}}"
 method="POST" class="needs-validation" novalidate>
        @csrf
        
        <fieldset class="fieldset fieldset-no-linea">
        <br>
        @foreach($datos['mascotas'] as $mascota)
            @foreach($datos['citaCirugias'] as $citaCirugia)
                @foreach($datos['propietarios'] as $propietario)
                    <center> <h5>Datos generales de la mascota</h5> </center>
                    <br>
                    <div class="form-row" >
                            <div class="form-group col-md-6">

                            <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                                <input type="text" class="form-control" name="title" id="IDMASCOTA" value = "{{$mascota->idMascota}}" readonly="readonly">

                                <strong> <label for="inputRazaMascota">RAZA</label></strong>
                                <input type="text" class="form-control" id="inputRazaMascota" value="{{$mascota->razaMascota}}" readonly="readonly">
                            </div>
                            <div class="form-group col-md-6">
                                <strong>  <label for="inputNombreMascota">Nombre</label></strong>


                                <input type="text" class="form-control" id="inputNombreMascota" name = "nombre_mascota" value="{{$mascota->nombreMascota}}" readonly="readonly">


                                <strong>  <label for="inputSexoMascota" >Sexo</label></strong>
                                <input type="text" class="form-control" id="inputSexoMascota" value="{{$mascota->sexoMascota}}" style="width: 180px;" readonly="readonly">
                            </div>

                            <div class="invisible">
                                <strong> <label for="IDMASCOTA">ID</label></strong>
                                <input type="text" class="form-control" id="IDMASCOTA" name="mascota_id" value = "{{$mascota->id}}" readonly="readonly">
                            </div>

                        </div>


                        <br>
                        <center> <h5>Datos generales del dueño</h5> </center>
                        <br>
                        <div class="form-row" style="background-color:#e1dff4">
                            <div class="form-group col-md-6">
                                <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
                            <input type="text" class="form-control" id="inputnombreDuenio" value="{{$propietario->nombrePropietario }}" readonly="readonly">
                            </div>
                            <div class="form-group col-md-6">
                                <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                            <input type="text" class="form-control" name="telefono" id="inputContactNumber" value="{{$propietario->telefonoPropietario}}" readonly="readonly">
                            </div>
                            <div class="form-group col-md-6">
                                <strong>   <label for="inputDireccion" style="color:black">Dirección</label></strong>
                                <input type="text" class="form-control" id="inputDireccion"  value="{{$propietario->direccionPropietario}}" readonly="readonly">
                            </div>
                        </div>


                        <br>
                        <center> <h5>Información de cirugía</h5> </center>
                        <br>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <strong>   <label for="ConceptoCirugia" style="color:black">Concepto de cirugía</label></strong>
                          
                                <textarea  class="form-control"  name="conceptoCirugia" id="ConceptoCirugia"  rows="3"  maxlength="100"  onchange="actualizar_mensaje_al_crear()"  required> {{$citaCirugia->conceptoCirugia}}</textarea>
                            
                                <div class="invalid-feedback">
                                    Por favor ingrese información sobre el concepto de cirugía
                                </div>
                                <div class="valid-feedback">
                                    Dato válido sobre concepto de cirugía
                                </div>
                            
                            </div>


                            <div class="form-group col-md-6">
                                <strong>   <label for="inputFechaCirugia" style="color:black">Fecha de cirugía</label></strong>
                                <input class="form-control" type="datetime-local" name="start" id="fechaHoraCitaCirugia" value="{{$citaCirugia->start}}"  onchange="actualizar_mensaje_al_crear()" required>

                                <div class="valid-feedback">
                                    Fecha correcta
                                </div>
                                <div class="invalid-feedback">
                                    Por favor ingrese una fecha válida
                                </div>
                            </div>



                            <div class="form-group col-md-6">
                                <strong>   <label for="RecomendacionesPre" style="color:black">Recomendaciones preoperatorias</label></strong>
                                <textarea class="form-control" id="RecomendacionesPre" name="recomendacionPreoOperatoria"   rows="3" maxlength="100" required> {{$citaCirugia->recomendacionPreoOperatoria}}</textarea>
                        
                                <div class="invalid-feedback">
                                    Por favor ingrese información sobre la recomendaciones preoperatorias pertinentes
                                </div>
                                <div class="valid-feedback">
                                    Dato válido sobre recomendaciones preoperatorias de cirugía
                                </div>
                        
                            </div>




                            <div class="invisible">
                                <strong> <label for="END">End</label></strong>
                                <input type="text" class="form-control" id="END" name="end" readonly="readonly">
                            </div>
                        </div>

                        
                        <div class="form-group d-none">
                            <label for=""></label>
                            <input type="text"
                            class="form-control" name="groupId" id="groupId" aria-describedby="helpId" value="citasCirugias">
                        </div>

                        <!--Esto es para realizar el filtro de cirugias en la agenda-->
                        <div class="form-group d-none">
                            <label for=""></label>
                            <input type="text"
                            class="form-control" name="filtercirugias" id="filtercirugias" aria-describedby="filtercirugias" value="citasCirugias">
                        </div>

                        @if ($datos['recordatorio'] != null)
                        <!--Recordatorio-->
                        <br>
                        <center>
                            <h5>Recordatorio</h5>
                        </center>
                        <br>
                        <section class="recordatorio_crear_seccion">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <strong> <label for="ConceptoCirugia" style="color:black">Anticipacion:</label></strong>
                                    <select name="dias_de_anticipacion" class="form-control" id="dias_de_anticipacion"
                                        onchange="actualizar_mensaje_al_crear();" onclick="actualizar_mensaje_al_crear_vacuna();">
                                        <option value="1"
                                        @php
                                            if($datos['recordatorio']->dias_de_anticipacion == 1){
                                                echo 'selected';
                                            }
                                        @endphp
                                        >1 dias de anticipacion</option>
                                        <option value="2"
                                        @php
                                            if($datos['recordatorio']->dias_de_anticipacion == 2){
                                                echo 'selected';
                                            }
                                        @endphp
                                        >2 dias de anticipacion</option>
                                        <option value="3"
                                        @php
                                            if($datos['recordatorio']->dias_de_anticipacion == 3){
                                                echo 'selected';
                                            }
                                        @endphp
                                        >3 dias de anticipacion</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <!--Validacion -->
                                        Por favor ingrese información sobre el concepto de cirugía
                                    </div>
                                    <div class="valid-feedback">
                                        Dato válido sobre concepto de cirugía
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
                        <!--Fin del recordatorio -->
                        @endif

                        <button type="submit" style="float: right; width: 100px; height: 50px;" class="btn btn-success mb-2">Guardar</button>
                 
                             @endforeach
                        @endforeach
                    @endforeach

                    <a href="{{url('/CirugiaPDF/'.$mascota->id)}}"  class="btn btn-primary btn-sm" data-placement= "left">{{__('Acta de permiso')}} </a> 
                
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
            actualizar_mensaje_al_crear();
        });
    </script>
@endsection