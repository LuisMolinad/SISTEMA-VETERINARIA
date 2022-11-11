@extends('app')

@section('titulo')
RECORD VACUNACION - {{'NOMBRE'}}
@endsection

@section('librerias')
<!--Data tables-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Llamamos al sweetalert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Llamamos nuestro documento de sweetalert -->
<script src="{{asset('js/eliminar_sweetalert2.js')}}"></script>

<link rel="stylesheet" href="{{ asset('css/Expediente/record.css') }}">

@endsection

@section('header')
<h1 class="header">RECORD VACUNACION - {{$datos['expediente']->mascota->nombreMascota}}</h1>
@endsection

@section('content')
<div class="container">
    @include('layouts.notificacion')
    <div class="record-informacion_general">
        <table>
            <tbody>
                <tr>
                    <td><strong>Dueño:</strong></td>
                    <td>{{$datos['expediente']->mascota->propietario->nombrePropietario}}</td>
                    <td></td>
                    <td><strong>{{$datos['expediente']->mascota->idMascota}}</strong></td>
                </tr>
                <tr>
                    <td><strong>Sexo:</strong></td>
                    <td>{{$datos['expediente']->mascota->sexoMascota}}</td>
                    <td><strong>Telefono:</strong></td>
                    <td>{{$datos['expediente']->mascota->propietario->telefonoPropietario}}</td>
                </tr>
                <tr>
                    <td><strong>Mascota</strong></td>
                    <td>{{$datos['expediente']->mascota->nombreMascota}}</td>
                    <td><strong>Fecha nacimiento:</strong></td>
                    <td>{{$datos['expediente']->mascota->fechaNacimiento}}</td>
                </tr>
                <tr>
                    <td><strong>Raza:</strong></td>
                    <td>{{$datos['expediente']->mascota->razaMascota}}</td>
                    <td><strong>Color:</strong></td>
                    <td>{{$datos['expediente']->mascota->colorMascota}}</td>
                </tr>
                <tr>
                    <td><strong>Direccion:</strong></td>
                    <td>{{$datos['expediente']->mascota->propietario->direccionPropietario}}</td>
                    <td><strong>Especie:</strong></td>
                    <td>{{$datos['expediente']->mascota->especie->nombreEspecie}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    {{-- * Botones --}}
    <div class="record-botones_crud">
        @if ($datos['expediente']->mascota->fallecidoMascota == 'Vivo')
        <button class="btn btn-success" id="btn-agregar-vacunacion" data-toggle="modal" data-target="#modal_record">Agregar record vacunacion</button>
        @endif
        <a href="/cartilla/{{$datos['expediente']->id}}" class="btn btn-info">Cartilla de vacunación</a>
    </div>

    <br>

    <div class="record-tablas">

        @foreach ($datos['vacunas'] as $vacuna)
            @foreach ($datos['especie_vacunas'] as $especie_vacuna)
                @if ($especie_vacuna->vacuna_id == $vacuna->id)
                <div class="record-card">
                    <h4>{{$vacuna->nombreVacuna}}</h4>
                    <table class="record-tabla">
                        <thead>
                            <th>Fecha</th>
                            <th>Peso (lbs.)</th>
                            <th>Refuerzo</th>
                            <th>Eliminar</th>
                        </thead>
                        <tbody>
                            @foreach ($datos['record'] as $record)
                            @if ($vacuna->id === $record->vacuna_id)
                            <tr>
                                <td id_linea="{{$record->id}}" class="record-fecha">{{$record->fecha}}</td>
                                <td id_linea="{{$record->id}}" class="record-peso">{{$record->peso}}</td>
                                <td id_linea="{{$record->id}}" class="record-refuerzo">{{$record->refuerzo}}</td>
                                <td>
                                    <form action="{{url('/record/'.$record->id)}}" method="post" id="EditForm{{$record->id}}">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <button type="submit" class="btn btn-danger" onclick="return alerta_eliminar_record('{{$record->id}}')"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            @endforeach
        @endforeach

    </div>

</div>

@if ($datos['expediente']->mascota->fallecidoMascota == 'Vivo')
@include('expediente.record_vacunacion.modal')
@endif
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

<script src="{{asset('js/Expediente/record.js')}}"></script>
@endsection