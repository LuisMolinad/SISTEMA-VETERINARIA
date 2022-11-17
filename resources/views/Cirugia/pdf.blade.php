<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acta de permiso de cirugía de {{$mascotas->idMascota}} - {{$mascotas->nombreMascota}}</title>
</head>
<body>
    <center> <h4>CLINICA VETERINARIA PET'S PARADISE</h4> </center>
        <center> <h5>AUTORIZACIÓN PARA REALIZAR TRATAMIENTO, PROCEDIMIENTO, SEDACIÓN O CIRUGÍA</h5> </center> 
              <p align="justify"><br> 
                  Yo, <strong>{{$mascotas->propietario->nombrePropietario }}</strong> que me identifico, 
                  con el documento (DUI, PASAPORTE, TARJETA DE RESIDENTE) _________________________________
                  Propietario (a) del ejemplar <strong>{{ $mascotas->nombreMascota }}</strong> Especie <strong>{{ $mascotas->especie->nombreEspecie}}</strong>
                  Raza  <strong> {{$mascotas->razaMascota}}</strong> Sexo <strong>{{$mascotas->sexoMascota}} </strong>Hago constar que he sido 
                  informado por parte del personal médico veterinario de PET'S PARADISE, que mi mascota se someta a: 
                <br>
                <br> 
                Por su padecimiento y como parte de su tratamiento a _______________________________________
                <br> 
                <br>
                Por métodos diagnosticados se le recomienda se le someta a __________________________________
                <br> 
                <br>
                Por manipulación dificultosa por su temperamento se le tenga que realizar_______________________
                <br> 
                <br>
                Por razones estéticas o salud bucal ______________________________________________________
                <br> 
                <br>
                Por control reproductivo he decidido realizar la ____________________________________________
                <br> 
                <br>
                Por tratamiento de una herida se realice ___________________________________________________
                <br> 
                <br> 
                <br> 
                Además, también hago constar, que he sido informado de los riesgos comunes e inherentes, al 
                procedimiento, además de otras complicaciones que puedan presentarse durante y después del 
                procedimiento médico-quirúrgico y/o de diagnóstico, así como en anestesia, transfusiones y la 
                administración de algunos medicamentos o tratamientos, sabiendo que existen riesgos de reacciones 
                adversas y complicaciones, tales como anafilaxias, infecciones, parálisis, daño cerebral e incluso
                la muerte. Así también se me explicó y quedo de acuerdo que el procedimiento médico-quirúrgico y 
                anestésico, si lo hubiere, que se aplicaría a mi mascota, es en beneficio de su salud.
                <br> 
                <br> 
                Por lo tanto, con pleno conocimiento y por mi expreso deseo AUTORIZO al personal médico-veterinario 
                de PET'S PARADISE a la realización del arriba mencionado procedimiento y cualquier otro que por emergencia 
                hubiese que realizarse en el transcurso del tratamiento de mi mascota, consciente de los riesgos que esto 
                implica, y ponderando que es más valioso el intento de buscar la salud y el bienestar de mi mascota,
                que dichos, riesgos, exonerándolos de responsabilidades civiles o penales.

                <br>
                <br>
                <br> 
                <br>
                <br> 
                Santa Tecla, __________________  &nbsp; de  &nbsp;  _____________________  &nbsp; del año &nbsp;  ______________.
                <br>
                <br>
                <br>
                <br>
                <br>
                <br> 
                Firma Propietario ________________     &nbsp;  &nbsp;           Firma Veterinario ___________________________
            </p> 
          
</body>
</html>