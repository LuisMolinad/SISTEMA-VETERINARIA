@extends('app')

@section('titulo')
    CONSULTAR CITA VACUNA
@endsection

@section('librerias')
    <link rel="stylesheet" href=" {{ asset('css/mascota_consultar.css') }} ">
@endsection

@section('header')
    <h1 class="header"> Cita Vacuna</h1>
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
                <h4 class="header4">Información Vacunación</h4>
                <ul>
                    <li><strong>Vacuna: </strong> {{ $vacuna->nombreVacuna }}</li>
                    <li><strong>Fecha Aplicación: </strong>
                        <?php
                        echo date('d-m-Y H:i', strtotime($idcitaVacuna->fechaAplicacion));
                        ?>
                    </li>
                    <li><strong>Fecha Refuerzo: </strong>
                        <?php
                        echo date('d-m-Y H:i', strtotime($idcitaVacuna->start));
                        ?>
                    </li>

                </ul>
            </article>
            <article>
                <h4 class="header4">Datos Generales de la Mascota</h4>
                <ul>

                    <li><strong>IDMASCOTA: </strong> {{ $mascotas->idMascota }}</li>
                    <li><strong>Nombre: </strong> {{ $mascotas->nombreMascota }}</li>
                    <li><strong>Peso: </strong>{{ $idcitaVacuna->pesolb }} </li>
                </ul>
            </article>
        </section>
        @if ($idRecordatorio != null)
            <section class="consultar_recordatorio">
                <article>

                    <h4 class="header4">Recordatorio</h4>

                    <p><strong>Fecha de envío del recordatorio: </strong>
                        <?php
                        echo date('d-m-Y', strtotime($idRecordatorio->fecha . ' - ' . $idRecordatorio->dias_de_anticipacion . ' days'));
                        ?>
                        {{-- {{ $idRecordatorio->fecha }} --}}</p>
                    <p><strong>Días de anticipación para el recordatorio: </strong>
                        {{ $idRecordatorio->dias_de_anticipacion }}

                    </p>

                    <p><strong>Mensaje a enviar:</strong></p>
                    <p><strong>Veterinaria Pet Paradise le informa</strong></p>
                    <p>Que la cita para <strong>{{ $mascotas->nombreMascota }} </strong> de
                        <strong>{{ $vacuna->nombreVacuna }}</strong> esta
                        agendada
                        para
                        la fecha y hora <span> <strong>{{ $idcitaVacuna->start }} </strong></span>. En caso de algun
                        incoveniente favor
                        comunicarse al
                        whatsapp +50370959194.<br><br>Att: Veterinaria Pets Paradise
                    <p>
                </article>
            </section>
        @endif

        <section class="caracteristicas_especiales">
            <article>
                <h4 class="header4">Contacto</h4>
                <ul>
                    <li><strong>Dueño: </strong> {{ $mascotas->propietario->nombrePropietario }}</li>
                    <li><strong>Telefono: </strong> {{ $mascotas->propietario->telefonoPropietario }}</li>
                    <li><strong>Direccion: </strong>{{ $mascotas->propietario->direccionPropietario }} </li>
                </ul>
            </article>
        </section>
        <div style="padding: 1cm">
            <a type="button" class="btn btn-secondary"
                href="{{ route('gestionVacuna.show', $mascotas->id) }}">Regresar</a>
        </div>
    @endsection
