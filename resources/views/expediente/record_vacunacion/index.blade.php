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
                    <td>{{$datos['expediente']->mascota->especie}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <br>
    <div class="record-botones_crud">
        <div id="btn-agregar-vacunacion" class="btn btn-success">Agregar record de vacunacion</div>
        <button class="btn btn-info">Cartilla de vacunacion</button>
    </div>

    <br>
    <div class="record-tablas">

        @foreach ($datos['vacunas'] as $vacuna)
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
                                <button type="submit" class="btn btn-danger" onclick="return alerta_eliminar_examen('{{$record->id}}')"><img src="{{asset('svg/trash-can.svg')}}" width="20" alt="Eliminar"></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        @endforeach

    </div>
</div>

<div class="record-space_modal none">
    <div class="record-modal">
        <h4>Record de vacunacion</h4>
        <form action="/record" method="post">
            @csrf
            <input name="expediente_id" type="text" value="{{$datos['expediente']->id}}" hidden>
            <div class="form-group">
                <label for="vacuna_id">Vacuna:</label>
                <div>
                    <select name="vacuna_id" id="form-vacuna">
                        @foreach ($datos['vacunas'] as $vacuna)
                        <option value="{{$vacuna->id}}">{{$vacuna->nombreVacuna}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <div>
                    <input type="date" name="fecha" id="form-fecha">
                </div>
            </div>
            <div class="form-group">
                <label for="peso">Peso:</label>
                <div>
                    <input type="number" name="peso" id="form-peso" min="1" step="0.1">
                </div>
            </div>
            <div class="form-group">
                <label for="refuerzo">Refuerzo:</label>
                <div>
                    <input type="date" name="refuerzo" id="form-refuerzo">
                </div>
            </div>
            <div class="contenedor-botones">
                <div id="modal-cerrar" class="btn btn-danger">Cerrar</div>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('js/Expediente/record.js')}}"></script>
@endsection