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
            <th scope="col">Numero</th>
            <th scope="col">Fecha y hora de la cita</th>
            <th scope="col">Fecha a enviar el recordatorio</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <?php
                        //echo date("d-m-Y --- h:i", strtotime($recordatorio->fecha));
                    ?>
                </td>
                <td> 
                    <?php 
                        //echo date("d-m-Y", strtotime($recordatorio->fecha . " - " . $recordatorio->dias_de_anticipacion . " days"));
                    ?> 
                </td>
                <td> </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection