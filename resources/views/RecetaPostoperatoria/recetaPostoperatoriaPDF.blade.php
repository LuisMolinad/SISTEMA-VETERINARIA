<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta postoperatoria de {{$nombre}}</title>
</head>
<body>

    <div style=" float:left" >
    <font color="green"> <h2><u><i> &nbsp;&nbsp;Pet's Paradise &nbsp;&nbsp; </i></u></h2> </font>
    </div>
    <div style=" float:right" >
        <p align="right" style="color:green;">
                 Calle El Jabalí Polig "D"-14 No. 7,<br>
                 Colonia Jardines del Volcán.<br>
                 <strong>Tel.: 2278-2114  Cel.: 7095-9194 </strong>  <br>
        </p> 
    </div>

    <div style="width: 500px; float: right; padding-left: 10px;">
    <p style="color:green;"><i><br> <br> El mejor amigo de su mejor amigo </i> </p> 
    </div>


    <div>
    <p align="left" style="color:green;"><i>  Dra. Flor de María Flamento</i>
                        <br> &nbsp;&nbsp;&nbsp;MEDICO VETERINARIA<br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; J.V.P.M.V No. 62 <br> <br></p>
    </div>


    <div style=" float:right" >
        <p align="right" style="color:green;">
       <strong> Fecha: </strong>   {{$fecha}} <br> <br>
        </p> 
    </div>


    <div style=" float:left" >
        <br><br><br> <font color="green"> <strong>  Paciente: </strong> </font>  {{$nombre}} 
                     <font color="green"> <strong>  Peso: </strong> </font>  {{$datos['pesoReceta']}}
    </div>
         
         
    <div style=" float:justify" >
            <br><br><br> <br><br><br><font color="green"> <strong>  R/ </strong>  <br><br></font>   
            
            {{$datos['tratamientoAplicarReceta']}}
            <br><br><br> <br><br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <p align="left" style="color:green;">
                <strong>  Cita: _______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; M.V. __________________________________</strong>  </font>  
               <br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  SELLO Y FIRMA
            </p>   
      
            <br>
            <br>
            <br>
            <br>
            <br>
   
          
            <hr style="color:green;">

    </div>


    



</body>
</html>