@extends('app')

@section('titulo')
Consultar recordatorio
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{asset('css/mascota_consultar.css')}} ">
@endsection

@section('header')
    <h1 class="header">Consultar recordatorio</h1>
@endsection

@section('content')
<div class="container consultar_mascota">
    <div class="dos_filas_centradas nombres_encabezado">
        <h2 class="header2"> <strong>{{$datos->id_mascota}} -- {{$datos->nombre}}</strong> </h2>
    </div>

    <section class="caracteristicas_especiales">
        <article>
            <h4 class="header4" >Datos del recordatorio</h4>
            <li><strong>Estado:</strong>
                @switch($datos->estado)
                    @case(0)
                        Pendiente de envio
                        @break
                    @case(1)
                        Enviado
                        @break
                    @case(-1)
                        No enviado
                    @break
                    @default
                        No encontrado
                @endswitch
            </li>
            <li><strong>Dias de anticipacion:</strong> {{$datos->dias_de_anticipacion}} </li>
            <li><strong>Fecha a enviar el recordatorio:</strong> {{$datos->fecha}} </li>
            <li><strong>Concepto:</strong> {{$datos->concepto}} </li>
            <li><strong>Telefono:</strong> {{$datos->telefono}} </li>
        </article>
    </section>
</div>
@endsection