<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ public_path('css/recetaPostOperatoria.css') }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta postoperatoria de {{$nombre}}</title>
</head>

<body>

    <div style=" float:left">
            <div class="linea_principal">
            <br>  <h1>&nbsp;  Pet's  Paradise &nbsp;</h1>  
            </div>
            <h4> El mejor amigo de su mejor amigo </h4>

    </div>
    <br>
     <br>
    <div class="container" style=" float:right">
            <div class="informacion_vet">
                 Calle El Jabalí Polig "D"-14 No. 7,
            </div>
            <div class="informacion_vet">
                 Colonia Jardines del Volcán.
            </div>
            <div class="informacion_vet_numero">
                 Tel.: 2278-2114  Cel.: 7095-9194
            </div>
           
     <br>
    </div>

     <br>
     <br>
     <br>

    <div class="container" style=" float:left">
            <div class="informacion_doctora">
                     Dra. Flor de María Flamento
            </div>
            <div class="informacion_doctora2">
                     MEDICO VETERINARIA
            </div>
            <div class="informacion_doctora2">
                      J.V.P.M.V No. 62
            </div>
    </div>


    <br>
    <br>



    <div style=" float:right" >
        <p class="fecha">
           Fecha:   </p> {{$fecha}}
        
    </div>



    <br>
    <br>


   


    <div style=" float:left" >
    <p class="informacion_paciente_nombre">  Paciente: </p>  {{$nombre}} 
    <p class="informacion_paciente_peso">    Peso:  </p>   {{$datos['pesoRecetaMedica']}} libras
    </div>
         
         
    <div style=" float:justify" >
    <br>
    <br>

    <p class="tratamiento">  R:/ </p>
            
    <p align="justify"> {{$datos['tratamientoAplicarRecetaMedica']}} </p>    

    </div>




    <br>
    <br>
    <div class="container">
            <div class="informacion_cita">
            Cita: __________________________
            </div>
            <div class="informacion_mv">
            M.V. __________________________ 
            </div>
            <div class="informacion_firma_sello">
             FIRMA Y SELLO  
            </div>
    </div>







    <footer>
            <div class="row">
                <hr>
            </div>  
           
            <div class="servicios">
                <img class="servicios" src="{{public_path('/img/final_servicios.png')}}">
            </div>
    </footer>



</body>
</html>