@extends('app')

@section('titulo')
Consultar Cita Limpieza dental
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{ asset('css/mascota_consultar.css') }} ">
@endsection

@section('header')
    <h1 class="header"> Cita de Limpieza dental</h1>
@endsection

@section('content')
    <div class="container consultar_mascota">
        <section class="consultar_mascota_encabezado">
            <div class="dos_filas_centradas nombres_encabezado">
                <h2 class="header2"> <strong>{{ $mascotas->idMascota }} -- {{ $mascotas->nombreMascota }}</strong> </h2>
                <h3 class="header3"> {{ $mascotas->propietario->nombrePropietario }} </h3>
            </div>
            @if ($mascotas->fallecidoMascota == 'Fallecido')
                <div class="black_ribbon_container">
                    <img class="black_ribbon" src="{{ asset('/img/black_ribon.webp') }}" alt="Liston negro">
                </div>
            @endif
        </section>

        <section class="consultar_mascota_datos">
            <article>
                <h4 class="header4">Información de Limpieza dental</h4>
                <ul>
                    <li><strong>Fecha: </strong>{{ $idcitaLimpiezaDental->start }}</li>
                </ul>
            </article>
            <article>
                <h4 class="header4">Datos Generales de la Mascota</h4>
                <ul>

                    <li><strong>idMascota: </strong> {{ $mascotas->idMascota }}</li>
                    <li><strong>Nombre: </strong> {{ $mascotas->nombreMascota }}</li>
                </ul>
            </article>
        </section>

        <section class="caracteristicas_especiales">
            <article>
                <h4 class="header4">Recordatorio</h4>
                <p> Mensaje de recordatorio </p>
            </article>
            <article>
                <h4 class="header4">Contacto</h4>
                <ul>
                    <li><strong>Dueño: </strong> {{ $mascotas->propietario->nombrePropietario }}</li>
                    <li><strong>Telefono: </strong> {{ $mascotas->propietario->telefonoPropietario }}</li>
                    <li><strong>Direccion: </strong>{{ $mascotas->propietario->direccionPropietario }} </li>
                </ul>
            </article>
        </section>
    </div>
@endsection
