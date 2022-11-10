<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas de Clinica Veterinaria Pet's Paradise</title>
    <link rel="stylesheet" href="{{ public_path('css/Expediente/tabla_vacuna.css') }}">
</head>
<body>
    

    <div align="center">
  
    <fieldset class="seccion"> 
    <legend>Informe de citas atendidas en Clinica Veterinaria Pet's Paradise</legend>
         <center><h3>Mes actual</h3></center>
            <table id="expediente-vacunas-tabla">
                <thead>
                        <th></th>
                        <th>Citas Cirugia</th>
                        <th>Citas Vacunas</th>
                        <th>Citas Limpieza Dental</th>
                        <th>Servicios</th>
                </thead>
                    
                <tbody>
                     <tr>
                        <td> Mes actual  </td>
                        <td> {{$citasCirugiaMesActual}} </td>
                        <td> {{$citasVacunaMesActual}} </td>
                        <td> {{$citasLimpiezaDentalMesActual}}</td>
                        <td> {{$citasServicios}} </td>
                     </tr>
                </tbody>
            </table>

        <br>
        <br>
        <hr>
        <hr>
            <!-- Trimestres -->
            <center><h3>Trimestres</h3></center>
            <table id="expediente-vacunas-tabla">
                <thead>
                        <th></th>
                        <th>Citas Cirugia</th>
                        <th>Citas Vacunas</th>
                        <th>Citas Limpieza Dental</th>
                        <th>Servicios</th>
                </thead>
                    
                <tbody>
                     <tr>
                        <td> Trimestre 1 </td>
                        <td> {{$cirugiasTrimestres[0]}} </td>
                        <td> {{$vacunasTrimestres[0]}} </td>
                        <td> {{$limpiezaTrimestres[0]}}</td>
                        <td> {{$servicioTrimestres[0]}} </td>
                     </tr>

                     <tr>
                        <td> Trimestre 2 </td>
                        <td> {{$cirugiasTrimestres[1]}} </td>
                        <td> {{$vacunasTrimestres[1]}} </td>
                        <td> {{$limpiezaTrimestres[1]}}</td>
                        <td> {{$servicioTrimestres[1]}} </td>
                     </tr>

                     <tr>
                        <td> Trimestre 3 </td>
                        <td> {{$cirugiasTrimestres[2]}} </td>
                        <td> {{$vacunasTrimestres[2]}} </td>
                        <td> {{$limpiezaTrimestres[2]}}</td>
                        <td> {{$servicioTrimestres[2]}} </td>
                     </tr>

                     <tr>
                        <td> Trimestre 4 </td>
                        <td> {{$cirugiasTrimestres[3]}} </td>
                        <td> {{$vacunasTrimestres[3]}} </td>
                        <td> {{$limpiezaTrimestres[3]}}</td>
                        <td> {{$servicioTrimestres[3]}} </td>
                     </tr>
                </tbody>
             </table>

             <br>
        <br>
        <hr>
        <hr>
             <!-- Año actual -->

             <center><h3>Año actual:</h3></center>
            <table id="expediente-vacunas-tabla">
                <thead>
                        <th></th>
                        <th>Citas Cirugia</th>
                        <th>Citas Vacunas</th>
                        <th>Citas Limpieza Dental</th>
                        <th>Servicios</th>
                </thead>
                    
                <tbody>
                     <tr>
                        <td> Año actual  </td>
                        <td> {{$consolidadoAnual[1]}} </td>
                        <td> {{$consolidadoAnual[0]}} </td>
                        <td> {{$consolidadoAnual[2]}}</td>
                        <td> {{$consolidadoAnual[3]}} </td>
                     </tr>
                </tbody>
            </table>
            </fieldset>

    </div>

</body>
</html>