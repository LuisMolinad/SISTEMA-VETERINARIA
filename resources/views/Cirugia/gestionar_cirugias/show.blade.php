@extends('app')

@section('titulo')
CONSULTAR CIRUGIA
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{asset('css/mascota_consultar.css')}} ">
@endsection

@section('header')
    <h1 class="header">CONSULTAR cirugia</h1>
@endsection

@section('content')
<div class="container consultar_mascota">
        <section class="consultar_mascota_encabezado">
            <div class="dos_filas_centradas nombres_encabezado">
                <h2 class="header2"> <strong>{{$mascotas->idMascota}} -- {{$mascotas->nombreMascota}}</strong> </h2>
                <h3 class="header3"> {{$mascotas->propietarios->nombrePropietario}} </h3>
            </div>
        </section>
        
        <section class="consultar_mascota_datos">
           
            <section class="consultar_mascota_datos">
                <article>
                    <h4 class="header4">Información de cirugía</h4>
                    <li><strong>Concepto: </strong> {{$conceptoCirugia}} </li>
                    <li><strong>Fecha de realización: </strong> {{$start}} </li>
                    <li><strong>Recomendaciones preoperatorias: </strong> {{$recomendacionPreoOperatoria}} </li>
                </article>
            </section>
            
            
            <article>
                    <h4 class="header4">Datos generales de la mascota  </h4>
                    <ul>
                        <li><strong>ID de la mascota: </strong>{{$mascotas->colorMascota}}</li>
                        <li><strong>nombreMascota: </strong>{{$mascotas->colorMascota}}</li>
                        <li><strong>Raza: </strong>{{$mascotas->colorMascota}}</li>
                        <li><strong>Sexo: </strong>{{$mascotas-s>sexoMascota}}</li>

                        
                    </ul>
                </article>
            
            
                <article>
                    <h4 class="header4">Datos generales del dueño</h4>
                    <ul>
                        <li><strong>Nombre: </strong> {{$mascotas->propietarios->nombrePropietario}} </li>
                        <li><strong>Número: </strong> {{$mascotas->propietarios->telefonoPropietario}} </li>
                        <li><strong>Dirección: </strong> {{$mascotas->propietarios->direccionPropietario}} </li>
                    </ul>
                </article>
        </section>

        <section class="caracteristicas_especiales">
            <article>
                <h4 class="header4">Recordatorio</h4>
                <p> Mensaje de recordatorio </p>
            </article>
        </section>

   
    </div>
@endsection