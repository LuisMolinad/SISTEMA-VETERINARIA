<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ public_path('css/cartilla.css') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartilla de vacunación {{$expediente->mascota->idMascota}}</title>
</head>
<body>
    <div class="tablaExterna" align="center">
        <div class="filaExterna">
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna">LEUCEMIA FELINA</th>
                            </tr>
                            <tr>
                                <th align="left">Fecha</th>
                                <th>Peso</th>
                                <th align="right">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leucemia as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 7 - sizeof($leucemia); $i++)
                                <tr class="filaRecord">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna">TRIPLE FELINA</th>
                            </tr>
                            <tr>
                                <th align="left">Fecha</th>
                                <th>Peso</th>
                                <th align="right">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($triple as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 7 - sizeof($triple); $i++)
                                <tr class="filaRecord">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="4" class="nombreVacuna">OTRAS VACUNAS</th>
                            </tr>
                            <tr>
                                <th align="left">Nombre</th>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th align="right">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($otras as $record)
                                <tr class="filaRecord"><td>$vacunas[$record->$vacuna_id]->nombreVacuna</td><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 7 - sizeof($otras); $i++)
                                <tr class="filaRecord">
                                    <td align="left">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right">&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <div style="text-align:center">
                        <div class="linea_principal">
                        <h1>Pet's  Paradise</h1>  
                        </div>
                        <h4>El mejor amigo de su mejor amigo</h4>
                    </div>
                    <img class="perritoYGatito" src="{{public_path('/img/perrito_y_gatito.jpg')}}">
                    <div class="datos">
                        <p class="dato"><b>Nombre: </b>{{$expediente->mascota->nombreMascota}}</p>
                        <p class="dato"><b>Raza: </b>{{$expediente->mascota->razaMascota}}</p>
                        <p class="dato"><b>Color: </b>{{$expediente->mascota->colorMascota}}</p>
                        <p class="dato"><b>Sexo: </b>{{$expediente->mascota->sexoMascota}}</p>
                        <p class="dato"><b>Fecha Nac.: </b>{{$expediente->mascota->fechaNacimiento}}</p>
                        <p class="dato"><b>Propietario: </b>{{$expediente->mascota->propietario->nombrePropietario}}</p>
                        <p class="dato"><b>Dirección: </b>{{$expediente->mascota->propietario->direccionPropietario}}</p>
                        <p class="dato"><b>Teléfono: </b>{{$expediente->mascota->propietario->telefonoPropietario}}</p>
                        <p class="dato"><b>Código: </b>{{$expediente->mascota->idMascota}}</p>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="informacion_doctora">
                        Dra. Flor de María Flamenco
                    </div>
                    <div class="informacion_doctora2">
                        MEDICO VETERINARIA
                    </div>
                    <div class="informacion_doctora2">
                        J.V.P.M.V. No. 62
                    </div>
                    <br>
                    <div class="informacion_vet">
                        Calle El Jabalí Polig "D"-14 No. 7,
                    </div>
                    <div class="informacion_vet">
                        Colonia Jardines del Volcán.
                    </div>
                    <div class="informacion_vet">
                        Tel.: 2278-2114  Cel.: 7095-9194
                    </div>
                    <div class="informacion_vet">
                        E-mail: florpet33@gmail.com
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pagebreak"></div>
    <div class="tablaExterna" align="center">
        <div class="filaExterna">
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna">VACUNAS RABIA</th>
                            </tr>
                            <tr>
                                <th align="left" class="cabeceras">Fecha</th>
                                <th class="cabeceras">Peso</th>
                                <th align="right" class="cabeceras">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rabia as $record)
                                <tr class="filaRecordInterno"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 13 - sizeof($rabia); $i++)
                                <tr class="filaRecordInterno">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna"><br>CONTROL DE PARASITOS</th>
                            </tr>
                            <tr>
                                <th align="left" class="cabeceras">Fecha</th>
                                <th class="cabeceras">Peso</th>
                                <th align="right" class="cabeceras">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parasitos as $record)
                                <tr class="filaRecordInterno"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 13 - sizeof($parasitos); $i++)
                                <tr class="filaRecordInterno">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna">VACUNAS PARVOVIRUS</th>
                            </tr>
                            <tr>
                                <th align="left" class="cabeceras">Fecha</th>
                                <th class="cabeceras">Peso</th>
                                <th align="right" class="cabeceras">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parvovirus as $record)
                                <tr class="filaRecordInterno"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 13 - sizeof($parvovirus); $i++)
                                <tr class="filaRecordInterno">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3" class="nombreVacuna">MOQUILLO-HEPATITIS-LEPTOSPIROSIS</th>
                            </tr>
                            <tr>
                                <th align="left" class="cabeceras">Fecha</th>
                                <th class="cabeceras">Peso</th>
                                <th align="right" class="cabeceras">Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moquillo as $record)
                                <tr class="filaRecordInterno"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                            @for($i = 1; $i <= 13 - sizeof($moquillo); $i++)
                                <tr class="filaRecordInterno">
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>