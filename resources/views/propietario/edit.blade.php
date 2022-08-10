@extends('app')

@section('titulo')
EDITAR PROPIETARIO
@endsection


@section('header')
    <h1 class="header">EDITAR PROPIETARIO</h1>
@endsection

@section('content')

<div class="container">
        <form action="{{url('/propietario/'.$propietario->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
            <legend class="legend">Propietario</legend>
                <div class="form-group">
                    <label for="nombrePropietario">Nombre del dueño</label>
                    <input type="text" maxlength="30" class="form-control" id="nombrePropietario" name="nombrePropietario" placeholder="Ingrese el nombre del dueño de la mascota" value="{{$propietario->nombrePropietario}}" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un nombre válido
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>

                <div class="form-group">
                    <label for="telefonoPropietario">Número de teléfono</label>
                    <input type="tel" maxlength="8" pattern="[0-9]{8}" class="form-control" id="telefonoPropietario" name="telefonoPropietario" placeholder="Ingrese el número de teléfono del dueño de la mascota" value="{{$propietario->telefonoPropietario}}" required>
                    <div class="invalid-feedback">
                        Por favor ingrese un número válido (8 digitos)
                    </div>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                </div>

                <div class="form-group">
                    <label for="direccionPropietario">Dirección</label>
                    <input type="text" maxlength="30" class="form-control" id="direccionPropietario" name="direccionPropietario" placeholder="Ingrese la dirección del dueño de la mascota" value="{{$propietario->direccionPropietario}}">
                </div>
            </fieldset>
            <div class="container">
            <button type="submit" class="btn btn-success mb-2">Editar</button>
            <!-- <a href="/propietario"><button type="button" class="btn btn-primary">Inicio</button></a> -->
            </div>
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