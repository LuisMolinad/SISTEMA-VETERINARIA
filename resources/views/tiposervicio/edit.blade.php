@extends('app')

@section('titulo')
Editar Servicio
@endsection

@section('header')
    <h1 class="header">Editar tipo de servicio veterinario</h1>
@endsection

@section('content')
<div class="container">
        {{-- <form action="{{url('/tiposervicio/'.$tipoServicio->id)}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate> --}}
        <form action="{{route('Tiposervicio.update',[$tipoServicio->id,'accion'=>"editar"])}}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                @csrf
            {{method_field('PATCH')}}
            <fieldset class="fieldset">
            <legend class="legend"><strong>Tipo de servicio</strong></legend>
                <div class="form-group">
                    <label for="nombreServicio"><strong>Nombre del servicio</strong></label>
                    <input type="text" maxlength="255" class="form-control" id="nombreServicio" name="nombreServicio" placeholder="Ingrese el nombre del servicio" value="{{$tipoServicio->nombreServicio}}" required>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un nombre válido
                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcionServicio"><strong>Descripción del servicio</strong></label>
                    <input type="text" maxlength="255" class="form-control" id="descripcionServicio" name="descripcionServicio" placeholder="Ingrese una descripción del servicio" value="{{$tipoServicio->descripcionServicio}}" required>
                    <div class="valid-feedback">
                        Dato válido
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una descripción válida
                    </div>
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