@extends('app')

@section('titulo')
Receta postoperatoria
@endsection

@section('librerias')
 
@endsection

@section('header')
<br>
<div class="container">
    <h1>Receta postoperatoria</h1>
</div>
@endsection
    @section('content')
            <div class="container">
                <form action="{{url('/receta_post_operatoria/guardar')}}" method="GET" class="needs-validation" novalidate>
                        
                        <fieldset class="fieldset fieldset-no-linea">
                            <center> <h5>Datos generales de la mascota</h5> </center>

                            <div class="form-row" >
                                    <div class="form-group col-md-6">

                                    <strong> <label for="IDMASCOTA">IDMASCOTA</label></strong>
                                        <input type="text" class="form-control" name="title" id="IDMASCOTA" value = "{{$datos['mascota']->idMascota}}" readonly="readonly">

                                        <strong> <label for="inputRazaMascota">RAZA</label></strong>
                                        <input type="text" class="form-control" id="inputRazaMascota" value="{{$datos['mascota']->razaMascota}}" readonly="readonly">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>  <label for="inputNombreMascota">Mascota</label></strong>


                                        <input type="text" class="form-control" id="inputNombreMascota" name = "nombre_mascota" value="{{$datos['mascota']->nombreMascota}}" readonly="readonly">


                                        <strong>  <label for="inputSexoMascota" >Sexo</label></strong>
                                        <input type="text" class="form-control" id="inputSexoMascota" value="{{$datos['mascota']->sexoMascota}}" style="width: 180px;" readonly="readonly">
                                    </div>

                                    <div class="invisible">
                                        <strong> <label for="IDMASCOTA">ID</label></strong>
                                        <input type="text" class="form-control" id="IDMASCOTA" name="mascota_id" value = "{{$datos['mascota']->id}}" readonly="readonly">
                                    </div>

                                </div>

                                <center> <h5>Información de cirugía</h5> </center>

                                    <div class="form-group col-md-6">
                                        <strong>   <label for="ConceptoCirugia">Concepto de cirugía</label></strong>
                                        <textarea class="form-control" id="ConceptoCirugia" name="conceptoCirugia" rows="3" maxlength="100" readonly="readonly"> {{$datos['cita_cirugia']->conceptoCirugia}} </textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>   <label for="inputFechaCirugia" >Fecha de cirugía</label></strong>
                                        <input class="form-control" type="text" name="start" id="fechaHoraCitaCirugia" value = 
                                        "@php
                                            echo date("d-m-Y  h:i", strtotime($datos['cita_cirugia']->start));
                                        @endphp" readonly="readonly">

                                    </div>

                                <br>
                                <br>
                                
                                <div class="form-group col-md-6"  style="background-color:#e1dff4">
                                <br>
                                    <strong>   <label for="tratamientoAplicarReceta" style="color:black">Tratamiento a aplicar</label></strong>
                                    <textarea class="form-control" id="tratamientoAplicarReceta" name="tratamientoAplicarReceta" rows="3" maxlength="100" placeholder="Tratamiento para el paciente"  required></textarea>
                            
                                    <div class="invalid-feedback">
                                        Por favor ingrese información sobre el tratamiento a aplicar 
                                    </div>
                                    <div class="valid-feedback">
                                        Dato válido sobre el tratamiento a aplicar
                                </div>
                                <br>
                                <div class="form-group col-md-6"  style="color:black">
                                    <strong> <label for="pesoReceta" style="color:black">Peso</label></strong>
                                    <input type="number" class="form-control" id="pesoReceta" maxlength="11" name="pesoReceta"
                                        style="width: 100px;" placeholder="lb" min="1" required>
                                    <div class="valid-feedback">
                                        Campo correcto
                                    </div>
                                  
                                    <div class="invalid-feedback">
                                        Por favor ingrese un peso de la mascota en lb.
                                    </div>
                                </div>
                                <br>
                                </div>
                              <button type="submit" class="btn btn-success mb-2">Crear receta post operatoria</button>
                              <br>
                              <br>
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