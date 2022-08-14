@extends('app')

@section('titulo')
GESTIONAR RECORDATORIOS
@endsection

@section('header')
<h1 class="header">GESTIONAR RECORDATORIOS</h1>
@endsection

@section('content')

@include('notificacion')

<div class="table-responsive-sm container-fluid contenedor">
    <div class="boton crear container_btn">
    <a href="/recordatorio/enviar_ui"><button type="button" class="btn btn-success boton_crear">Crear mensaje de recordatorio</button></a>
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
                <tr>
                    <td> {{$recordatorio->id_mascota}} </td>
                    <td> {{$recordatorio->nombre}} </td>
                    <td> {{$recordatorio->concepto}} </td>
                    <td> {{$recordatorio->telefono}} </td>
                    <td>
                        <?php
                            echo date("d-m-Y --- h:i", strtotime($recordatorio->fecha));
                        ?>
                    </td>
                    <td> 
                        <?php 
                            echo date("d-m-Y", strtotime($recordatorio->fecha . " - " . $recordatorio->dias_de_anticipacion . " days"));
                        ?> 
                    </td>
                    <td id = "botones-linea">
                        <a href="{{ url('/recordatorio/'.$recordatorio->id.'/edit') }}"><button type="button" class="btn btn-warning">Editar</button></a>
{{--                         <form id="EditForm{{$mascota->id}}" action="{{url('/mascota/'.$mascota->id)}}" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button onclick="return alerta_eliminar_general('{{$mascota->nombreMascota}}','{{$mascota->id}}');" type="submit" class="btn btn-danger">Eliminar</button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection