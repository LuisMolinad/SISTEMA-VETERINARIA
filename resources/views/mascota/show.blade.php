@extends('app')

@section('titulo')
CONSULTAR MASCOTA
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{asset('css/mascota_consultar.css')}} ">
@endsection

@section('header')
    <h1 class="header">CONSULTAR MASCOTA</h1>
@endsection

@section('content')
    <div class="container consultar_mascota">
        <section class="consultar_mascota_encabezado">
            <div class="dos_filas_centradas nombres_encabezado">
                <h2 class="header2"> <strong>{{$mascota->idMascota}} -- {{$mascota->nombreMascota}}</strong> </h2>
                <h3 class="header3"> {{$mascota->propietario->nombrePropietario}} </h3>
            </div>
            @if ($mascota->fallecidoMascota == 'Fallecido' )
            <div class="black_ribbon_container">
                <img class="black_ribbon" src="{{asset('/img/black_ribon.webp')}}" alt="Liston negro">
            </div>
            @endif
        </section>
        
        <section class="consultar_mascota_datos">
            <article>
                <h4 class="header4">Datos generales</h4>
                <ul>
                    <li><strong>Sexo: </strong>{{$mascota->sexoMascota}}</li>
                    <li><strong>Color: </strong>{{$mascota->colorMascota}}</li>
                    <li><strong>Fecha de nacimiento: </strong>
                        @php
                        echo date("d-m-Y", strtotime($mascota->fechaNacimiento))
                        @endphp
                        </li>
                    <li><strong>Estado: </strong>{{$mascota->fallecidoMascota}}</li>
                    <li><strong>Especie: </strong>{{$mascota->especie->nombreEspecie}} -- <strong> Raza: </strong> {{$mascota->razaMascota}}</li>
                </ul>
            </article>
            <article>
                <h4 class="header4">Contacto</h4>
                <ul>
                    <li><strong>Telefono: </strong> {{$mascota->propietario->telefonoPropietario}} </li>
                    <li><strong>Direccion: </strong> {{$mascota->propietario->direccionPropietario}} </li>
                </ul>
            </article>
        </section>

        @if ($mascota->caracteristicasEspeciales != null)
            <section class="caracteristicas_especiales">
                <article>
                    <h4 class="header4">Caracteristicas especiales</h4>
                    <p> {{$mascota->caracteristicasEspeciales}} </p>
                </article>
            </section>
        @endif

        <button type="button" class="btn btn-secondary" style="float:right;" onclick="history.back();" >Regresar</button>
    </div>
@endsection