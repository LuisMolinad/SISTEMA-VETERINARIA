<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ secure_asset('css/actadeefuncion.css') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificado de defunción</title>
</head>

<body>
    <div>
        <h1>Certificado de defunción </h1>
    </div>
    <br>
    <br>
    <h3>Estimado/a {{ $mascotas->propietario->nombrePropietario }}:</h3>
    <br>
    <br>
    <br><br><br>

    <p> La veterinaria Pet's Paradise lamenta la pérdida irreparable de {{ $mascotas->nombreMascota }}
     Nos unimos a usted y a su familia en este momento de duelo.</p>

    <div class="center">
        <p>
            <i>“Cuándo tienes a alguien a quien amas en el cielo, tienes un pedacito de cielo en tu casa para
                siempre”</i>
        </p>
    </div>
    <footer>
        <hr>
        <div class="container">
            <div class="row">
                Veterinaria Pet's Paradise
            </div>
            <div class="row">
                Santa Tecla Col. Jardines del Vólcan Calle El Jabalí
            </div>
            <div class="row">
                7095-9194
            </div>
            <div class="row">
                2278-2114
            </div>
        </div>
    </footer>

</html>
</body>
