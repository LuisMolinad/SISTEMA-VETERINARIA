<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$datos['expediente']->mascota->idMascota}}</title>

    <!--CSS Local-->
    <!--
    <link rel="stylesheet" href="{{secure_asset('css/pdf.css')}}">-->

    <link rel="stylesheet" href="{{ public_path('css/Expediente/tabla_vacuna.css') }}">

</head>
<body>
    <header class="header">
    </header>
        <main>
            <div class="container">

                <div class="page-1">
                    <center><h1>CLINICA VETERINARIA PET'S PARADISE</h1></center>
                    <center><h2>REPORTE DE LA MASCOTA {{$datos['expediente']->mascota->idMascota}}</h2></center>
                    <fieldset class="seccion">
                        <legend>Mascota</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$datos['expediente']->mascota->id}}</p>
                        <p class="articulo"><span class="campo">Codigo de la mascota: </span> {{$datos['expediente']->mascota->idMascota}}</p>
                        <p class="articulo"><span class="campo">Nombre de la mascota: </span> {{$datos['expediente']->mascota->nombreMascota}}</p>
                        <p class="articulo"><span class="campo">Estado de la mascota: </span> {{$datos['expediente']->mascota->fallecidoMascota}}</p>
                        <p class="articulo"><span class="campo">Raza mascota: </span> {{$datos['expediente']->mascota->razaMascota}}</p>
                        <p class="articulo"><span class="campo">Especie: </span> {{$datos['expediente']->mascota->especie->nombreEspecie}}</p>
                        <p class="articulo"><span class="campo">Color:</span> {{$datos['expediente']->mascota->colorMascota}}</p>
                        <p class="articulo"><span class="campo">Sexo de la mascota: </span> {{$datos['expediente']->mascota->sexoMascota}}</p>
                        <p class="articulo"><span class="campo">Fecha de nacimiento: </span> {{$datos['expediente']->mascota->fechaNacimiento}}</p>
                        <p class="articulo"><span class="campo">Caracteristicas especiales:</span><br>{{$datos['expediente']->mascota->caracteristicasEspeciales}}</p>
                    </fieldset>
                    <br>
                    <fieldset class="seccion">
                        <legend>Propietario de la mascota</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$datos['expediente']->mascota->propietario->id}}</p>
                        <p class="articulo"><span class="campo">Nombre del propietario: </span>{{$datos['expediente']->mascota->propietario->nombrePropietario}}</p>
                        <p class="articulo"><span class="campo">Telefono: </span>{{$datos['expediente']->mascota->propietario->telefonoPropietario}}</p>
                        <p class="articulo"><span class="campo">Direccion: </span>{{$datos['expediente']->mascota->propietario->direccionPropietario}}</p>
                    </fieldset>
                    <br>
                    {{-- <fieldset class="seccion">
                        <legend>Expediente</legend>
                        <p class="articulo"><span class="campo">ID: </span>{{$expediente->id}}</p>
                        <?php
                            if($datos['expediente']->mascota->fallecidoMascota == "Fallecido"){
                                echo '<p class="articulo"><span class="campo">Causa del fallecimiento: </span>' . $datos['expediente']->causaFallecimiento . '</p>';
                            }                        
                        ?>
                    </fieldset> --}}
                </div>

                <div class="page-break"></div>

                <div class="page-2">
                    <center><h1>VACUNAS APLICADAS</h1></center>
                    <table id="expediente-vacunas-tabla">
                        <thead>
                            <tr>
                                <th>Aplicacion</th>
                                <th>Refuerzo</th>
                                <th>Peso (libras)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos['vacunas'] as $vacuna)
                                @foreach ($datos['especie_vacunas'] as $especie_vacuna)
                                    @if ($especie_vacuna->vacuna_id == $vacuna->id)
                                    <tr><p>{{$vacuna->nombreVacuna}}</p></tr>
                                        @foreach ($datos['record'] as $record)
                                            @if ($vacuna->id === $record->vacuna_id)
                                                <tr>
                                                    <td>{{$record->fecha}}</td>
                                                    <td>{{$record->refuerzo}}</td>
                                                    <td>{{$record->peso}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="page-break"></div>

                <div class="page-3">
                    <center><h1>HISTORIAL MEDICO</h1></center>
                    @foreach ($datos['linea'] as $linea)
                        <div class="historial-medico">
                            <span>{{$linea->fechaLineaHistorial}}</span>
                            <p>{{$linea->textoLineaHistorial}}</p>
                        </div>
                    @endforeach
                </div>

                <style>
                    .page-break {
                        page-break-after: always;
                    }
                </style>

            </div>
        </main>
</body>
</html>