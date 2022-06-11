<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte {{$expediente->mascota->idMascota}}</title>

    <!--CSS Local-->
    <link rel="stylesheet" href="{{asset('css/pdf.css')}}">
</head>
<body>
    <header class="header">
        <h1>CLINICA VETERINARIA PET'S PARADISE</h1>
        <h2>REPORTE DE LA MASCOTA </h2>
    </header>
        <main>

            <div class="container">
                <fieldset class="seccion">
                    <legend>Mascota</legend>
                    <p class="articulo"><span class="campo">ID: </span>{{$expediente->mascota->id}}</p>
                    <p class="articulo"><span class="campo">Codigo de la mascota: </span> {{$expediente->mascota->idMascota}}</p>
                    <p class="articulo"><span class="campo">Nombre de la mascota: </span> {{$expediente->mascota->nombreMascota}}</p>
                    <p class="articulo"><span class="campo">Raza mascota: </span> {{$expediente->mascota->razaMascota}}</p>
                    <p class="articulo"><span class="campo">Especie: </span> {{$expediente->mascota->especie}}</p>
                    <p class="articulo"><span class="campo">Color:</span> {{$expediente->mascota->colorMascota}}</p>
                    <p class="articulo"><span class="campo">Sexo de la mascota: </span> {{$expediente->mascota->sexoMascota}}</p>
                    <p class="articulo"><span class="campo">Fecha de nacimiento: </span> {{$expediente->mascota->fechaNacimiento}}</p>
                    <p class="articulo"><span class="campo">Caracteristicas especiales:</span><br>{{$expediente->mascota->caracteristicasEspeciales}}</p>
                </fieldset>
                <fieldset class="seccion">
                    <legend>Propietario de la mascota</legend>
                    <p class="articulo"><span class="campo">ID: </span>{{$expediente->mascota->propietario->id}}</p>
                    <p class="articulo"><span class="campo">Nombre del propietario: </span>{{$expediente->mascota->propietario->nombrePropietario}}</p>
                    <p class="articulo"><span class="campo">Telefono: </span>{{$expediente->mascota->propietario->telefonoPropietario}}</p>
                    <p class="articulo"><span class="campo">Direccion: </span>{{$expediente->mascota->propietario->direccionPropietario}}</p>
                </fieldset>
                <fieldset class="seccion">
                    <legend>Expediente</legend>
                    <p class="articulo"><span class="campo">ID: </span>{{$expediente->id}}</p>
                    <p class="articulo"><span class="campo">Estado: </span>{{$expediente->fallecidoExpediente}}</p>
                    <?php
                        if($expediente->fallecidoExpediente == "Fallecido"){
                            echo '<p class="articulo"><span class="campo">Causa del fallecimiento: </span>' . $expediente->causaFallecimiento . '</p>';
                        }
                    ?>
                </fieldset>
            </div>
        </main>
</body>
</html>