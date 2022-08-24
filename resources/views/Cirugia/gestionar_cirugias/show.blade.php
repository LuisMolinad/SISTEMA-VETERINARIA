@extends('app')

@section('titulo')
    CONSULTAR CITA CIRUGIA
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{ asset('css/mascota_consultar.css') }} ">
@endsection

@section('header')
    <h1 class="header"> Cita de cirugía</h1>
@endsection

@section('content')
    <div class="container consultar_mascota">
        @foreach($datos['mascotas'] as $mascota)
            @foreach($datos['citaCirugias'] as $citaCirugia)
                @foreach($datos['propietarios'] as $propietario)
                <section class="consultar_mascota_encabezado">
                <div class="dos_filas_centradas nombres_encabezado">
                    <h2 class="header2"> <strong>{{$mascota->idMascota}} -- {{$mascota->nombreMascota}}</strong> </h2>
                    <h3 class="header3"> {{$propietario->nombrePropietario}} </h3>
                    
                
                </div>
            </section>

            <section class="caracteristicas_especiales">
                <article>
                    <h4 class="header4">Información de cirugía</h4>
                    <ul>
                        <li><strong>Concepto de cirugia: </strong> {{$citaCirugia->conceptoCirugia}}</li>
                        <li><strong>Fecha Refuerzo: </strong>{{$citaCirugia->start}}</li>
                        <li><strong>Recomendaciones preoperatorias: </strong> {{$citaCirugia->recomendacionPreoOperatoria}}</li>
                    </ul>
                    </article>
            </section> 
             
            <section class="consultar_mascota_datos">
                <article>
                    <h4 class="header4">Datos generales de la Mascota</h4>
                    <ul>

                        <li><strong>Código de la mascota: </strong> {{$mascota->idMascota}}</li>
                        <li><strong>Nombre: </strong> {{$mascota->nombreMascota}}</li>
                        <li><strong>Raza:  </strong>{{$mascota->razaMascota}} </h2>
                        <li><strong>Sexo:  </strong>{{$mascota->sexoMascota}} </h2>
                    </ul>
                </article>
                <article>
                    <h4 class="header4">Datos generales del propietario</h4>
                    <ul>
                        <li><strong>Dueño: </strong> {{$propietario->nombrePropietario}}</li>
                        <li><strong>Teléfono: </strong> {{$propietario->telefonoPropietario}}</li>
                        <li><strong>Dirección: </strong>{{$propietario->direccionPropietario}} </li>
                    </ul>
                </article>
            </section>

            @if ($datos['recordatorios'] != null)
                <section class="caracteristicas_especiales">
                    <article>
                        <h4 class="header4">Recordatorio</h4>
                        <p> {{$datos['recordatorios']->concepto}} </p>
                        <p>
                            @php
                                echo date("d-m-Y", strtotime($datos['recordatorios']->fecha . " - " . $datos['recordatorios']->dias_de_anticipacion . " days"));
                            @endphp    
                        </p>
                        <p>
                            Dias de anticipacion: {{$datos['recordatorios']->dias_de_anticipacion}}
                        </p>
                    </article>
                </section>
            @endif

            <a href="{{url('/CirugiaPDF/'.$mascota->id)}}"  class="btn btn-primary" data-placement= "right">{{__('Acta de permiso')}} </a> 
            <br>
            <br>
            <a href="{{ route('GestionCirugia.index', $mascota->id) }}"><button type="button" class="btn btn-secondary">Regresar</button></a>
                @endforeach
            @endforeach
        @endforeach
    </div>
@endsection
