@extends('app')

@section('titulo')
    Cita de vacunación
@endsection

@section('librerias')
    <!-- Cualquier duda o comentario comunicarse con Rosalio -->
    <!--CSS para recordatorios -->
    <link rel="stylesheet" href="{{ asset('css/recordatorio.css') }}">
    <!--Fin del CSS para recordatorios -->
    <!--JS para recordatorios -->
    <script src="{{ asset('js/recordatorio.js') }}"></script>
    <!--Fin del JS para recordatorios -->
    <!-- Cualquier duda o comentario comunicarse con Rosalio -->

    <!-- Llamamos al sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Llamamos nuestro documento de sweetalert -->
    <script src="{{ asset('js/alertaCambioVacuna.js') }}"></script>
    {{-- JQUERY --}}
    <script src="{{ asset('js/editarFechaAplicacion.js') }}"></script>
@endsection

@section('header')
    <br>
    <div class="container">
        <h1>Editar Cita Vacunación</h1>
    </div>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('citaVacuna.update', ['idCita' => $idcitaVacuna->id, 'idmascota' => $mascotas->id]) }}"
            method="POST" class="needs-validation" novalidate>
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong> <label for="mascota_id"> IDMASCOTA</label></strong>
                    <input type="text" class="form-control" id="title" name="title"
                        value="{{ $mascotas->idMascota }}" readonly="readonly">
                    <input class="form-control" id="idVisible" name="idVisible" value="{{ $mascotas->idMascota }}"
                        type="hidden">
                    <input class="form-control" id="mascota_id" name="mascota_id" value="{{ $mascotas->id }}"
                        type="hidden">
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="pesolb">Nombre:</label></strong>
                    <input class="form-control" name="nombre_mascota" readonly="readonly" id="nombreMascota"
                        value="{{ $mascotas->nombreMascota }}">

                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="pesolb">Peso</label></strong>
                    <input type="number" class="form-control" id="pesolb" maxlength="11" name="pesolb"
                        style="width: 100px;" placeholder="lb" min="1" readonly="readonly"
                        value="{{ $idcitaVacuna->pesolb }}" required>
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
                    <strong> <label for="inputContactNumber" style="color:black">Número de contacto</label></strong>
                    <input type="text" class="form-control" name="inputContactNumber" id="inputContactNumber"
                        placeholder="Número de contacto" value="{{ $mascotas->propietario->telefonoPropietario }}"
                        readonly="readonly">

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
                            <option value="{{ $idVacuna->id }}"
                                data-url="{{ route('diasVacuna.obtenerDias', $idVacuna->id) }}" selected>
                                {{ $idVacuna->nombreVacuna }}</option>
                        </select>
                        <div class="valid-feedback">
                            Campo correcto
                        </div>
                        <div class="invalid-feedback">
                            Seleccione una vacuna
                        </div>

                    </div>
                    {{-- INPUT DIAS OCULTOS --}}
                    <div style="display: none;">
                        <input type="number" id="vacuna-dia">
                    </div>

                    {{-- INPUT DIAS OCULTOS --}}
                    {{-- INPUT seleccion OCULTOS --}}
                    <div style="display: none;">
                        <input type="text" id="seleccion">
                    </div>

                    {{-- INPUT seleccion OCULTOS --}}
                </div>
                <div class="form-group col-md-6">
                    <strong> <label for="end" style="color:black">Fecha aplicación</label></strong>
                    <input class="form-control" type="datetime-local" name="end" id="end"
                        value="{{ $idcitaVacuna->fechaAplicacion }}" required>
                    <div class="valid-feedback">
                        Campo correcto
                    </div>
                    <div class="invalid-feedback">
                        Por favor ingrese una fecha válida
                    </div>


                </div>


                <div class="form-group col-md-6">
                    <strong> <label for="start" style="color:black">Fecha refuerzo</label></strong>
                    <input class="form-control" type="datetime-local" name="start" id="start"
                        value="{{ $idcitaVacuna->start }}" onchange="actualizar_mensaje_al_crear_vacuna()" required>
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
            @if ($idcitaVacuna->recordatorio_id != null)
                <section class="recordatorio_crear_seccion">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong> <label for="ConceptoCirugia" style="color:black">Anticipacion:</label></strong>
                            <select name="dias_de_anticipacion" class="form-control" id="dias_de_anticipacion"
                                onchange="actualizar_mensaje_al_crear_vacuna();"
                                onclick="actualizar_mensaje_al_crear_vacuna();">
                                <option value="0" selected>No, no deseo un recordatorio</option>
                                <option value="1">1 dias de anticipacion</option>
                                <option value="2">2 dias de anticipacion</option>
                                <option value="3">3 dias de anticipacion</option>
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
            @endif
            <button type="submit" style=" width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>

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



        function funcionesOnClick() {
            actualizar_mensaje_al_crear_vacuna();
        }
    </script>
@endsection
