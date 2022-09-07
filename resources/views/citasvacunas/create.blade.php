@extends('app')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- Llamamos al sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Llamamos nuestro documento de sweetalert -->
    <script src="{{ asset('js/alertaCambioVacuna.js') }}"></script>
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
                        style="width: 100px;" placeholder="lb" min="1" required>
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
                <input type="text" class="none" name="id_propietario" value="{{ $mascotas->propietario->id }}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <strong> <label for="inputDireccion" style="color:black">Vacuna</label></strong>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="vacuna_id">Vacunas</label>
                        </div>
                        <select data-swal-toast-template="#my-template" class="custom-select" id="vacuna_id"
                            name='vacuna_id' onchange="actualizar_mensaje_al_crear_vacuna()" required>
                            @foreach ($vacunas as $vacuna)
                                <option value="" selected disabled hidden>
                                    Nada seleccionado</option>
                                <option value="{{ $vacuna->id }}"
                                    data-url="{{ route('diasVacuna.obtenerDias', $vacuna->id) }}">
                                    {{ $vacuna->nombreVacuna }}</option>
                            @endforeach
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
                    <input class="form-control" type="datetime-local" name="start"
                        onchange="actualizar_mensaje_al_crear_vacuna()" id="start" required>
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
            <div class="form-group col-md-6">
                <button type="submit" style=" width: 100px; height: 50px;" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        @include('layouts.vacuna')
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
        })();


        //Funciona select
        //Obtengo el id seleccionado de una vacuna

        var valor_inicial = ''; //variable para ir comparando
        $("#vacuna_id").change(function() {
            //capturo el valor de id seleccionado


            var VacunaSeleccionada = $(this).find('option:selected');
            //texto que captura la seleccion previa
            var valor_texto = $('#seleccion').val();
            console.log('Valor del input previo ' + valor_texto);
            var valor_opcion = $(this).find('option:selected').text();
            //seleccionado sin espacios
            valorOpcion = jQuery.trim(valor_opcion);

            //si el actual es diferente al que estaba antes se alerta
            if (valor_texto && valor_texto != valorOpcion) {
                //de sweet alert
                // cambioVacuna();
                /*  if (cambioVacuna() == false) {
                     console.log(false)
                 }
                 if (cambioVacuna() == true) {
                     console.log(true)
                 } */
                alert('Cambió la Vacuna, se reiniciara la fecha')


            }

            console.log('Valor del seleccionado ' + valorOpcion);
            //URL de la funcion
            var vacunaURL = VacunaSeleccionada.data('url');
            //trae las cosas por medio de la url
            $.get(vacunaURL, function(data) {
                $('#vacuna-dia').val(data.tiempoEntreDosisDia);
            })

            valor_inicial = valorOpcion;
            $('#seleccion').val(valor_inicial);

            // Reiniciamos si hay un cambio 
            document.getElementById("end").value = "";
            document.getElementById("start").value = "";

            $("#dias_de_anticipacion").val("");



        });
        /* }); */



        /* Jquery CALENDARIO FUNCIONAL */
        $('#end')[0].valueAsNumber = 6e4 * (Math.floor(Date.now() / 6e4) - new Date().getTimezoneOffset());
        $('#end').change(function() {
            var date = new Date(this.valueAsNumber);


            //los dias del input oculto validados
            var dias = parseInt($("#vacuna-dia").val(), 10);
            //alert para testear
            alert($("#vacuna-dia").val());

            date.setDate(date.getDate() + dias);

            $('#start')[0].valueAsNumber = +date;

        });
        $('#start').change();



        function funcionesOnClick() {
            actualizar_mensaje_al_crear_vacuna();
        }
    </script>
@endsection
