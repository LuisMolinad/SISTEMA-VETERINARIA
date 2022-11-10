<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ public_path('css/cartilla.css') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartilla</title>
</head>

<body>
    <div class="tablaExterna" align="center">
        <div class="filaExterna">
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3">LEUCEMIA FELINA</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                                {{-- <?php
                                        $fila="<td>".$leucemia[5]->fecha."</td><td>".$leucemia[5]->peso."</td><td>".$leucemia[5]->refuerzo."</td>";
                                        echo $fila;
                                ?> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leucemia as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3">TRIPLE FELINA</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($triple as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="4">OTRAS VACUNAS</th>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($otras as $record)
                                <tr class="filaRecord"><td>$vacunas[$record->$vacuna_id]->nombreVacuna</td><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <h1>Pet's Paradise</h1>
                    ________________________________    
                    <p>El mejor amigo de su mejor amigo</p>
                    <img class="perritoYGatito" src="{{public_path('/img/perrito_y_gatito.jpg')}}">
                    <div class="datos">
                        <p><b>Nombre: </b>{{$expediente->mascota->nombreMascota}}</p>
                        <p><b>Raza: </b>{{$expediente->mascota->razaMascota}}</p>
                        <p><b>Color: </b>{{$expediente->mascota->colorMascota}}</p>
                        <p><b>Sexo: </b>{{$expediente->mascota->sexoMascota}}</p>
                        <p><b>Fecha Nac.: </b>{{$expediente->mascota->fechaNacimiento}}</p>
                        <p><b>Propietario: </b>{{$expediente->mascota->propietario->nombrePropietario}}</p>
                        <p><b>Dirección: </b>{{$expediente->mascota->propietario->direccionPropietario}}</p>
                        <p><b>Teléfono: </b>{{$expediente->mascota->propietario->telefonoPropietario}}</p>
                        <p><b>Código: </b>{{$expediente->mascota->idMascota}}</p>
                    </div>
                </div>
                <p><b>Dra. Flor de María Flamenco de Tello</b></p>
                <p><b>MEDICO VETERINARIA</b></p>
                <p><b>J.V.P.M.V. No. 62</b></p>
                <p><b>Calle El Jabalí Polig "D"-14 No. 7,</b></p>
                <p><b>Colonia Jardines del Volcán.</b></p>
                <p style="color:red;">Creo que mas abajo dice algo.....</p>
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
                                <th colspan="3">VACUNAS RABIA</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rabia as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3">CONTROL DE PARASITOS</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parasitos as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="celdaExterna">
                <div class="bordeInternoTabla">
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3">VACUNAS PARVOVIRUS</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($parvovirus as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="recordTabla">
                        <thead>
                            <tr>
                                <th colspan="3">MOQUILLO-HEPATITIS-LEPTOSPIROSIS</th>
                            </tr>
                            <tr>
                                <th>Fecha</th>
                                <th>Peso</th>
                                <th>Refuerzo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($moquillo as $record)
                                <tr class="filaRecord"><td>{{$record->fecha}}</td><td>{{$record->peso}}</td><td>{{$record->refuerzo}}</td></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>