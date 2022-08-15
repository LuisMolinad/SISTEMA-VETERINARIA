@extends('app')

@section('titulo')
    Cita de vacunación
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
    <br>
    <div class="container">
        <h1>Cita Vacunación</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('/guardarCitaVacuna') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong> <label for="mascota_id"> IDMASCOTA</label></strong>
                    <input type="text" class="form-control" id="idVisible" name="idVisible"
                        value="{{ $mascotas->idMascota }}" readonly="readonly">
                    <input class="form-control" id="mascota_id" name="mascota_id" value="{{ $mascotas->id }}" type="hidden"
                        readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="pesolb">Nombre:</label></strong>
                    <input class="form-control" readonly="readonly" id="title" name="title"
                        value="{{ $mascotas->nombreMascota }}">
                    <div class="valid-feedback">
                        Campo correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese un peso en lb.
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="pesolb">Peso</label></strong>
                    <input type="number" class="form-control" id="pesolb" maxlength="11" name="pesolb"
                        style="width: 100px;" placeholder="lb" required>
                    <div class="valid-feedback">
                        Campo correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese un peso en lb.
                    </div>
                </div>
            </div>
            <div class="form-row" style="background-color:#e1dff4">
                <div class="form-group col-md-6">
                    <strong> <label for="inputnombreDuenio"style="color:black">Dueño</label> </strong>
                    <input type="text" class="form-control" value="{{ $mascotas->propietario->nombrePropietario }}"
                        id="inputnombreDuenio" placeholder="Nombre del dueño" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                    <strong>  <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                  <input type="text" class="form-control" name="inputContactNumber" id="inputContactNumber" placeholder="Número de contacto" value = "{{$mascotas->propietario->telefonoPropietario }}" readonly="readonly">

                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="inputDireccion" style="color:black">Direccion</label></strong>
                    <input type="text" class="form-control" id="inputDireccion" placeholder="Direccion del dueño"
                        value="{{ $mascotas->propietario->direccionPropietario }}" readonly="readonly">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong> <label for="inputDireccion" style="color:black">Vacuna</label></strong>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="vacuna_id">Vacunas</label>
                        </div>
                        <select class="custom-select" id="vacuna_id" name='vacuna_id' required>
                            @foreach ($vacunas as $vacuna)
                                <option value="{{ $vacuna->id }}">{{ $vacuna->nombreVacuna }}</option>
                            @endforeach
                        </select>
                        <div class="valid-feedback">
                            Campo correcto
                        </div>
                        <div class="invalid-feedback">
                            Seleccione una vacuna
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="end" style="color:black">Fecha aplicación</label></strong>
                    <input class="form-control" type="datetime-local" name="end" id="end" required>
                    <div class="valid-feedback">
                        Campo correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="start" style="color:black">Fecha refuerzo</label></strong>
                    <input class="form-control" type="datetime-local" name="start" id="start" onchange="actualizar_mensaje_al_crear_vacuna()" required>
                    <div class="valid-feedback">
                        Campo correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>
                </div>
            </div>

            <div class="form-group d-none">
                <label for=""></label>
                <input type="text" class="form-control" name="groupId" id="groupId" aria-describedby="helpId"
                    value="citasVacunacion">
            </div>

            <!--Este es el campo para filtro-->
            <div class="form-group d-none">
                <label for=""></label>
                <input type="text" class="form-control" name="filtervacunas" id="filtervacunas"
                    aria-describedby="filtervacunas" value="citasVacunacion">
            </div>


            @include('layouts.crear_recordatorio')

                <button type="submit" style=" width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
        </div>
        <!--<button type="submit" href="{{ url('/guardarCitaVacuna/'.$mascotas->id) }}" style="float: right; width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>-->

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
