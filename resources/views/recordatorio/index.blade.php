@extends('app')

@section('titulo')
GESTIONAR RECORDATORIOS
@endsection

@section('header')
<h1 class="header">GESTIONAR RECORDATORIOS</h1>
@endsection

@section('librerias')
<script src=" {{asset('js/recordatorio_enviar_mensajes.js')}} "></script>
<link rel="stylesheet" href=" {{asset('css/recordatorio.css')}} ">
@endsection

@section('content')

@include('notificacion')

<div class="table-responsive-sm container-fluid contenedor">
    <div class="boton crear container_btn">
    <a href="/recordatorio/enviar_ui"><button type="button" class="btn btn-success boton_crear">Crear mensaje de recordatorio</button></a>
    </div>
    <div class="boton crear container_btn">
        <button type="button" onclick="enviar_mensajes()" class="btn btn-success boton_crear">Enviar mensajes</button>
    </div>
    <table class="table table-striped" style="width:100%" id="propietario">
        <thead class="table-dark table-header">
            <tr>
            <th scope="col">Id mascota</th>
            <th scope="col">Nombre</th>
            <th scope="col">Concepto</th>
            <th scope="col">Telefono</th>
            <th scope="col">Fecha y hora de la cita</th>
            <th scope="col">Fecha a enviar el recordatorio</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordatorios as $recordatorio)
                @if ($recordatorio->dias_de_anticipacion != 0)
                    <tr
                    <?php
                        if($recordatorio->estado == 1){
                            echo 'class="mensaje_enviado"';
                            echo ' style="background-color: lightgreen;"';
                        }
                        else if($recordatorio->estado == -1){
                            echo 'class="mensaje_no_enviado"';
                            echo ' style="background-color: lightcoral;"';
                        }
                    ?>
                    >
                        <td class="dato_id_mascota"> {{$recordatorio->id_mascota}} </td>
                        <td class="dato_nombre"> {{$recordatorio->nombre}} </td>
                        <td class="dato_concepto" > {{$recordatorio->concepto}} </td>
                        <td class="dato_telefono" > {{$recordatorio->telefono}} </td>
                        <td class="dato_fecha" >
                            <?php
                                echo date("d-m-Y --- h:i", strtotime($recordatorio->fecha));
                            ?>
                        </td>
                        <td class="dato_fecha_enviar" > 
                            <?php 
                                echo date("d-m-Y", strtotime($recordatorio->fecha . " - " . $recordatorio->dias_de_anticipacion . " days"));
                            ?> 
                        </td>
                        <td id = "botones-linea">
                            <a href="{{ url('/recordatorio/'.$recordatorio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
                            <form {{-- id="EditForm{{$mascota->id}}" --}} action="{{url('/recordatorio/'.$recordatorio->id)}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                {{-- <button onclick="return alerta_eliminar_general('{{$mascota->nombreMascota}}','{{$mascota->id}}');" type="submit" class="btn btn-danger">Eliminar</button> --}}
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    <p class="dato_id none"> {{$recordatorio->id}} </p>
                    <p class="dato_estado none"> {{$recordatorio->estado}} </p>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection