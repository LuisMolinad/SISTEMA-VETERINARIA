@extends('app')

@section('titulo')
Nueva vacuna
@endsection

@section('header')
    <h1 class="header">Crear vacuna</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/vacuna')}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            <fieldset class="fieldset">
            <legend class="legend"><strong>Vacuna</strong></legend>
                <div class="form-group">
                    <label for="nombreVacuna"><strong>Nombre de la vacuna</strong></label>
                    <input type="text" maxlength="255" class="form-control" id="nombreVacuna" name="nombreVacuna" placeholder="Ingrese el nombre de la vacuna" required>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un nombre válido
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcionVacuna"><strong>Descripción de la vacuna</strong></label>
                    <input type="text" maxlength="255" class="form-control" id="descripcionVacuna" name="descripcionVacuna" placeholder="Ingrese una descripción de la vacuna" required>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una descripción válida
                    </div>
                </div>

                <div class="form-group">
                    <label for="tiempoEntreDosisDia"><strong>Tiempo entre dósis</strong></label>
                    <input type="number" min="1" class="form-control" id="tiempoEntreDosisDia" name="tiempoEntreDosisDia" placeholder="Ingrese el tiempo entre dosis de la vacuna en días" required>
                    <input id="disponibilidadVacuna" name="disponibilidadVacuna" type="hidden" value="1">
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un tiempo entre dósis válido
                    </div>
                </div>

                <div class="form-group">
                    <label for="especies"><strong>Especies que pueden recibir la vacuna</strong></label>
                        <br>
                        {{-- Para listar cada especie de la tabla especies y asociarlas a la vacuna --}}
                        @foreach ($especies as $especie)
                            <label style="margin-right: 25px"><input style="margin-right: 5px" type="checkbox" name="especies[]" value="{{$especie->id}}">{{$especie->nombreEspecie}}</label>
                        @endforeach
                    {{-- <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un tiempo entre dósis válido
                    </div> --}}
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary">Guardar</button>
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