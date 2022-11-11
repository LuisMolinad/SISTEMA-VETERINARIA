<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas de Clinica Veterinaria Pet's Paradise</title>
    <link rel="stylesheet" href="{{ public_path('css/Expediente/tabla_vacuna.css') }}">
    <script src="{{ asset('js/graficas.js') }}" type="text/javascript" defer></script>
</head>
<body>
    

    <div align="center">
  
    <fieldset class="seccion"> 
    <legend>Informe de citas atendidas en Clinica Veterinaria Pet's Paradise</legend>
         <center><h3>Mes actual, {{$mes_actual}} </h3></center>
            <table id="expediente-vacunas-tabla">
                <thead>
                       
                        <th>Citas Cirugia</th>
                        <th>Citas Vacunas</th>
                        <th>Citas Limpieza Dental</th>
                        <th>Servicios</th>
                </thead>
                    
                <tbody>
                     <tr>
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
                        <td style="text-align: left"> Trimestre 1: Enero - Marzo </td>
                        <td> {{$cirugiasTrimestres[0]}} </td>
                        <td> {{$vacunasTrimestres[0]}} </td>
                        <td> {{$limpiezaTrimestres[0]}}</td>
                        <td> {{$servicioTrimestres[0]}} </td>
                     </tr>

                     <tr>
                     <td style="text-align: left"> Trimestre 2: Abril - Junio</td>
                        <td> {{$cirugiasTrimestres[1]}} </td>
                        <td> {{$vacunasTrimestres[1]}} </td>
                        <td> {{$limpiezaTrimestres[1]}}</td>
                        <td> {{$servicioTrimestres[1]}} </td>
                     </tr>

                     <tr>
                     <td style="text-align: left"> Trimestre 3: Julio - Septiembre </td>
                        <td> {{$cirugiasTrimestres[2]}} </td>
                        <td> {{$vacunasTrimestres[2]}} </td>
                        <td> {{$limpiezaTrimestres[2]}}</td>
                        <td> {{$servicioTrimestres[2]}} </td>
                     </tr>

                     <tr>
                     <td style="text-align: left"> Trimestre 4: Octubre - Diciembre </td>
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

             <center><h3>Año actual, {{$año_actual}} </h3></center>
            <table id="expediente-vacunas-tabla">
                <thead>
                        <th>Citas Cirugia</th>
                        <th>Citas Vacunas</th>
                        <th>Citas Limpieza Dental</th>
                        <th>Servicios</th>
                </thead>
                    
                <tbody>
                     <tr>
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
