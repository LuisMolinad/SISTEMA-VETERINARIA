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
            <div class="row">
            <h2>  Pet's Paradise </h2>
            </div>
            <div class="row">
            <hr> 
            <h3> El mejor amigo de su mejor amigo </h3>
            </div>     
    </div>

    <div class="container" style=" float:right">
            <div class="row">
                 Calle El Jabalí Polig "D"-14 No. 7,
            </div>
            <div class="row">
                 Colonia Jardines del Volcán.
            </div>
            <div class="row">
                 Tel.: 2278-2114  Cel.: 7095-9194
            </div>
    </div>
    <br>
     <br>

  


     <br>
     <br>
     <br>
     <br>

    <div class="container">
            <div class="row">
                 Dra. Flor de María Flamento
            </div>
            <div class="row">
                 MEDICO VETERINARIA
            </div>
            <div class="row">
                 J.V.P.M.V No. 62
            </div>
    </div>








    <div style=" float:right" >
        <p>
       <strong> Fecha: </strong>   {{$fecha}} <br> <br>
        </p> 
    </div>


    <div style=" float:left" >
        <br><br><br><strong>  Paciente: </strong> {{$nombre}} 
        <strong>  Peso: </strong>   {{$datos['pesoReceta']}}
    </div>
         
         
    <div style=" float:justify" >
            <br><br><br> <br><br><br> <strong>  R/ </strong>  <br><br>
            
            {{$datos['tratamientoAplicarReceta']}}            

    </div>


    <div class="container">
            <div class="row">
            Cita: _______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M.V. __________________________________
            </div>
    </div>

    <footer>
            <div class="row">
                <hr>
            </div>         
    </footer>



</body>
</html>