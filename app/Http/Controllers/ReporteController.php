<?php

namespace App\Http\Controllers;


use App\Models\citaVacuna;
use App\Models\citaCirugia;
use App\Models\citaLimpiezaDental;
use App\Models\citaServicio;
use Carbon\Carbon; //para manejar fechas
use App\Models\tipoServicio;
use PDF;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //Capto solo los nombres que estan habilitados
        $nombresServicios = tipoServicio::where('disponibilidadServicio', '=', '1')->pluck('nombreServicio');
        //Capturando la fecha del sistema
        $now = Carbon::now();
        //Capturando unicamente el mes
        $mesEnCurso = $now->month;


        //capturando los datos, deben ser correspondiente al mes en curso
        $citasVacunaMesActual = citaVacuna::whereMonth('fechaAplicacion', $mesEnCurso)->get()->count();
        $citasCirugiaMesActual = citaCirugia::whereMonth('start', $mesEnCurso)->get()->count();
        $citasLimpiezaDentalMesActual = citaLimpiezaDental::whereMonth('start', $mesEnCurso)->get()->count();
        //cita servicios
        $citasServicios = citaServicio::whereMonth('start', $mesEnCurso)->get()->count();


        //*TODO Propesta 2 agrupa todo por arreglos
        //*TODO Citas Vacuna
        $citasVacuna = citaVacuna::select('id', 'fechaAplicacion')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->fechaAplicacion)->format('m'); // grouping by months
            });

        $citaVacunaContador = []; //*Arreglos que sirven para navegar por meses
        $citaVacunaArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

        foreach ($citasVacuna as $key => $value) {
            $citaVacunaContador[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($citaVacunaContador[$i])) {
                $citaVacunaArreglo[$i] = $citaVacunaContador[$i];
            } else {
                $citaVacunaArreglo[$i] = 0;
            }
        }

        //TODO: cita cirugia
        $citaCirugia = citaCirugia::select('id', 'start')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->start)->format('m'); // grouping by months
            });


        $citaCirugiaContador = []; //*Arreglos que sirven para navegar por meses
        $citaCirugiaArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

        foreach ($citaCirugia as $key => $value) {
            $citaCirugiaContador[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($citaCirugiaContador[$i])) {
                $citaCirugiaArreglo[$i] = $citaCirugiaContador[$i];
            } else {
                $citaCirugiaArreglo[$i] = 0;
            }
        }

        //TODO: cita limpieza dental
        $citaLimpiezaDental = citaLimpiezaDental::select('id', 'start')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->start)->format('m'); // grouping by months
            });


        $citaLimpiezaDentalContador = []; //*Arreglos que sirven para navegar por meses
        $citaLimpiezaDentalArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

        foreach ($citaLimpiezaDental as $key => $value) {
            $citaLimpiezaDentalContador[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($citaLimpiezaDentalContador[$i])) {
                $citaLimpiezaDentalArreglo[$i] = $citaLimpiezaDentalContador[$i];
            } else {
                $citaLimpiezaDentalArreglo[$i] = 0;
            }
        }

        //TODO: cita servicio
        $citasServiciosAnual = citaServicio::select('id', 'start')
            ->get()
            ->groupBy(function ($date) {
                //return Carbon::parse($date->created_at)->format('Y'); // grouping by years
                return Carbon::parse($date->start)->format('m'); // grouping by months
            });


        $citasServiciosAnualContador = []; //*Arreglos que sirven para navegar por meses
        $citasServiciosAnualArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade] y contiene la cantidad por mes

        foreach ($citasServiciosAnual as $key => $value) {
            $citasServiciosAnualContador[(int)$key] = count($value);
        }

        for ($i = 1; $i <= 12; $i++) {
            if (!empty($citasServiciosAnualContador[$i])) {
                $citasServiciosAnualArreglo[$i] = $citasServiciosAnualContador[$i];
            } else {
                $citasServiciosAnualArreglo[$i] = 0;
            }
        }



        //*-----------Sumatoria de citas anual------------------------------------------------------------------------------------------------------------------------------
        $sizeVacuna = $citaVacunaArreglo;
        $sumaVacuna = 0;
        foreach ($sizeVacuna as $numero) {
            $sumaVacuna += $numero;
        }
        $size = $citaCirugiaArreglo;
        $sumaCirugia = 0;
        foreach ($size as $numero) {
            $sumaCirugia += $numero;
        }
        $sizeLimpieza = $citaLimpiezaDentalArreglo;
        $sumaLimpieza = 0;
        foreach ($sizeLimpieza as $numero) {
            $sumaLimpieza += $numero;
        }
        $sizeServicio = $citasServiciosAnualArreglo;
        $sumaServicio = 0;
        foreach ($sizeServicio as $numero) {
            $sumaServicio += $numero;
        }
        $consolidadoAnual = [$sumaVacuna, $sumaCirugia, $sumaLimpieza, $sumaServicio];


        $jsonConsolidadoAnual = json_encode($consolidadoAnual);
        //*TODO PRIMER TRIMESTRE Enero a Marzo, SEGUNDO TRIMESTRE: Abril a Junio, TERCER TRIMESTRE Julio a Septiembre, CUARTO TRIMESTRE: Octubre a Diciembre


        //*-----------Sumatoria para de vacuna trimestral------------------------------------------------------------------------------------------------------------------------------
        $numeros = $citaVacunaArreglo;
        $vacunaTrimestre1 = 0;
        for ($i = 1; $i < 4; $i++) {
            $vacunaTrimestre1 += $numeros[$i];
        }

        $vacunaTrimestre2 = 0;
        for ($i = 4; $i < 7; $i++) {
            $vacunaTrimestre2 += $numeros[$i];
        }

        $vacunaTrimestre3 = 0;
        for ($i = 7; $i < 10; $i++) {
            $vacunaTrimestre3 += $numeros[$i];
        }

        $vacunaTrimestre4 = 0;
        for ($i = 10; $i < 13; $i++) {
            $vacunaTrimestre4 += $numeros[$i];
        }
        //*arreglo que contiene los semestres 
        $vacunasTrimestres = [$vacunaTrimestre1, $vacunaTrimestre2, $vacunaTrimestre3, $vacunaTrimestre4];

        $jsonVacunasTrimestres = json_encode($vacunasTrimestres);
        //*-----------Inicio Sumatoria  de cita de cirugia trimestral------------------------------------------------------------------------------------------------------------------------------

        $sum = $citaCirugiaArreglo;
        $cirugiaTrimestre1 = 0;
        for ($i = 1; $i < 4; $i++) {
            $cirugiaTrimestre1 += $sum[$i];
        }

        $cirugiaTrimestre2 = 0;
        for ($i = 4; $i < 7; $i++) {
            $cirugiaTrimestre2 += $sum[$i];
        }

        $cirugiaTrimestre3 = 0;
        for ($i = 7; $i < 10; $i++) {
            $cirugiaTrimestre3 += $sum[$i];
        }

        $cirugiaTrimestre4 = 0;
        for ($i = 10; $i < 13; $i++) {
            $cirugiaTrimestre4 += $sum[$i];
        }

        $cirugiasTrimestres = [$cirugiaTrimestre1, $cirugiaTrimestre2, $cirugiaTrimestre3, $cirugiaTrimestre4];

        $jsonCirugiasTrimestres = json_encode($cirugiasTrimestres);

        //*-----------Fin Sumatoria  de cita de cirugia trimestral------------------------------------------------------------------------------------------------------------------------------
        //*-----------Inicio Sumatoria  de cita de Limpieza Dental trimestral------------------------------------------------------------------------------------------------------------------------------

        $sum = $citaLimpiezaDentalArreglo;
        $limpiezaTrimestre1 = 0;
        for ($i = 1; $i < 4; $i++) {
            $limpiezaTrimestre1 += $sum[$i];
        }

        $limpiezaTrimestre2 = 0;
        for ($i = 4; $i < 7; $i++) {
            $limpiezaTrimestre2 += $sum[$i];
        }

        $limpiezaTrimestre3 = 0;
        for ($i = 7; $i < 10; $i++) {
            $limpiezaTrimestre3 += $sum[$i];
        }

        $limpiezaTrimestre4 = 0;
        for ($i = 10; $i < 13; $i++) {
            $limpiezaTrimestre4 += $sum[$i];
        }

        $limpiezaTrimestres = [$limpiezaTrimestre1, $limpiezaTrimestre2, $limpiezaTrimestre3, $limpiezaTrimestre4];

        $jsonLimpiezasTrimestres = json_encode($limpiezaTrimestres);

        //*-----------Fin Sumatoria  de cita de Limpieza Dental trimestral------------------------------------------------------------------------------------------------------------------------------

        //*-----------Inicio Sumatoria  de cita de servicio trimestral------------------------------------------------------------------------------------------------------------------------------

        $sum = $citasServiciosAnualArreglo;
        $servicioTrimestre1 = 0;
        for ($i = 1; $i < 4; $i++) {
            $servicioTrimestre1 += $sum[$i];
        }

        $servicioTrimestre2 = 0;
        for ($i = 4; $i < 7; $i++) {
            $servicioTrimestre2 += $sum[$i];
        }

        $servicioTrimestre3 = 0;
        for ($i = 7; $i < 10; $i++) {
            $servicioTrimestre3 += $sum[$i];
        }

        $servicioTrimestre4 = 0;
        for ($i = 10; $i < 13; $i++) {
            $servicioTrimestre4 += $sum[$i];
        }

        $servicioTrimestres = [$servicioTrimestre1, $servicioTrimestre2, $servicioTrimestre3, $servicioTrimestre4];

        $jsonServicioTrimestres = json_encode($servicioTrimestres);

        //*-----------Fin Sumatoria  de cita de servicio trimestral------------------------------------------------------------------------------------------------------------------------------
        //*Para grafica acumulado anualmente
        /*    $arrayServicio = json_encode($citasServiciosAnualArreglo);
        $arrayLimpieza = json_encode($citaLimpiezaDentalArreglo);
        $arrayCirugia = json_encode($citaCirugiaArreglo);
        $arrayVacuna = json_encode($citaVacunaArreglo);
 */
        // print_r($jsonConsolidadoAnual);
        // print_r($arrayServicio);
        //Impimiendo unicamente para corroborar 
        /*  print_r($jsonVacunasTrimestres);
        print_r($jsonCirugiasTrimestres);
        print_r($jsonLimpiezasTrimestres);
        print_r($jsonServicioTrimestres); */
        return view('reporte.index', compact(
            'nombresServicios',
            'citasVacunaMesActual',
            'citasCirugiaMesActual',
            'citasLimpiezaDentalMesActual',
            'citasServicios',
            'jsonVacunasTrimestres',
            'jsonCirugiasTrimestres',
            'jsonLimpiezasTrimestres',
            'jsonServicioTrimestres',
            'jsonConsolidadoAnual'
        ));
    
       
    }

    public function pdfG(Request $request)
    {
         
      //Capto solo los nombres que estan habilitados
      $nombresServicios = tipoServicio::where('disponibilidadServicio', '=', '1')->pluck('nombreServicio');
      //Capturando la fecha del sistema
      $now = Carbon::now();
      //Capturando unicamente el mes
      $mesEnCurso = $now->month;


      //capturando los datos, deben ser correspondiente al mes en curso
      $citasVacunaMesActual = citaVacuna::whereMonth('fechaAplicacion', $mesEnCurso)->get()->count();
      $citasCirugiaMesActual = citaCirugia::whereMonth('start', $mesEnCurso)->get()->count();
      $citasLimpiezaDentalMesActual = citaLimpiezaDental::whereMonth('start', $mesEnCurso)->get()->count();
      //cita servicios
      $citasServicios = citaServicio::whereMonth('start', $mesEnCurso)->get()->count();


      //*TODO Propesta 2 agrupa todo por arreglos
      //*TODO Citas Vacuna
      $citasVacuna = citaVacuna::select('id', 'fechaAplicacion')
          ->get()
          ->groupBy(function ($date) {
              return Carbon::parse($date->fechaAplicacion)->format('m'); // grouping by months
          });

      $citaVacunaContador = []; //*Arreglos que sirven para navegar por meses
      $citaVacunaArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

      foreach ($citasVacuna as $key => $value) {
          $citaVacunaContador[(int)$key] = count($value);
      }

      for ($i = 1; $i <= 12; $i++) {
          if (!empty($citaVacunaContador[$i])) {
              $citaVacunaArreglo[$i] = $citaVacunaContador[$i];
          } else {
              $citaVacunaArreglo[$i] = 0;
          }
      }

      //TODO: cita cirugia
      $citaCirugia = citaCirugia::select('id', 'start')
          ->get()
          ->groupBy(function ($date) {
              return Carbon::parse($date->start)->format('m'); // grouping by months
          });


      $citaCirugiaContador = []; //*Arreglos que sirven para navegar por meses
      $citaCirugiaArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

      foreach ($citaCirugia as $key => $value) {
          $citaCirugiaContador[(int)$key] = count($value);
      }

      for ($i = 1; $i <= 12; $i++) {
          if (!empty($citaCirugiaContador[$i])) {
              $citaCirugiaArreglo[$i] = $citaCirugiaContador[$i];
          } else {
              $citaCirugiaArreglo[$i] = 0;
          }
      }

      //TODO: cita limpieza dental
      $citaLimpiezaDental = citaLimpiezaDental::select('id', 'start')
          ->get()
          ->groupBy(function ($date) {
              return Carbon::parse($date->start)->format('m'); // grouping by months
          });


      $citaLimpiezaDentalContador = []; //*Arreglos que sirven para navegar por meses
      $citaLimpiezaDentalArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade]  y contiene la cantidad por mes

      foreach ($citaLimpiezaDental as $key => $value) {
          $citaLimpiezaDentalContador[(int)$key] = count($value);
      }

      for ($i = 1; $i <= 12; $i++) {
          if (!empty($citaLimpiezaDentalContador[$i])) {
              $citaLimpiezaDentalArreglo[$i] = $citaLimpiezaDentalContador[$i];
          } else {
              $citaLimpiezaDentalArreglo[$i] = 0;
          }
      }

      //TODO: cita servicio
      $citasServiciosAnual = citaServicio::select('id', 'start')
          ->get()
          ->groupBy(function ($date) {
              return Carbon::parse($date->start)->format('m'); // grouping by months
          });


      $citasServiciosAnualContador = []; //*Arreglos que sirven para navegar por meses
      $citasServiciosAnualArreglo = []; //*este [ultimo es el acumulador, en este pasamos al blade] y contiene la cantidad por mes

      foreach ($citasServiciosAnual as $key => $value) {
          $citasServiciosAnualContador[(int)$key] = count($value);
      }

      for ($i = 1; $i <= 12; $i++) {
          if (!empty($citasServiciosAnualContador[$i])) {
              $citasServiciosAnualArreglo[$i] = $citasServiciosAnualContador[$i];
          } else {
              $citasServiciosAnualArreglo[$i] = 0;
          }
      }



      //*-----------Sumatoria de citas anual------------------------------------------------------------------------------------------------------------------------------
      $sizeVacuna = $citaVacunaArreglo;
      $sumaVacuna = 0;
      foreach ($sizeVacuna as $numero) {
          $sumaVacuna += $numero;
      }
      $size = $citaCirugiaArreglo;
      $sumaCirugia = 0;
      foreach ($size as $numero) {
          $sumaCirugia += $numero;
      }
      $sizeLimpieza = $citaLimpiezaDentalArreglo;
      $sumaLimpieza = 0;
      foreach ($sizeLimpieza as $numero) {
          $sumaLimpieza += $numero;
      }
      $sizeServicio = $citasServiciosAnualArreglo;
      $sumaServicio = 0;
      foreach ($sizeServicio as $numero) {
          $sumaServicio += $numero;
      }
      $consolidadoAnual = [$sumaVacuna, $sumaCirugia, $sumaLimpieza, $sumaServicio];


      $jsonConsolidadoAnual = json_encode($consolidadoAnual);
      //*TODO PRIMER TRIMESTRE Enero a Marzo, SEGUNDO TRIMESTRE: Abril a Junio, TERCER TRIMESTRE Julio a Septiembre, CUARTO TRIMESTRE: Octubre a Diciembre


      //*-----------Sumatoria para de vacuna trimestral------------------------------------------------------------------------------------------------------------------------------
      $numeros = $citaVacunaArreglo;
      $vacunaTrimestre1 = 0;
      for ($i = 1; $i < 4; $i++) {
          $vacunaTrimestre1 += $numeros[$i];
      }

      $vacunaTrimestre2 = 0;
      for ($i = 4; $i < 7; $i++) {
          $vacunaTrimestre2 += $numeros[$i];
      }

      $vacunaTrimestre3 = 0;
      for ($i = 7; $i < 10; $i++) {
          $vacunaTrimestre3 += $numeros[$i];
      }

      $vacunaTrimestre4 = 0;
      for ($i = 10; $i < 13; $i++) {
          $vacunaTrimestre4 += $numeros[$i];
      }
      //*arreglo que contiene los semestres 
      $vacunasTrimestres = [$vacunaTrimestre1, $vacunaTrimestre2, $vacunaTrimestre3, $vacunaTrimestre4];

      $jsonVacunasTrimestres = json_encode($vacunasTrimestres);
      //*-----------Inicio Sumatoria  de cita de cirugia trimestral------------------------------------------------------------------------------------------------------------------------------

      $sum = $citaCirugiaArreglo;
      $cirugiaTrimestre1 = 0;
      for ($i = 1; $i < 4; $i++) {
          $cirugiaTrimestre1 += $sum[$i];
      }

      $cirugiaTrimestre2 = 0;
      for ($i = 4; $i < 7; $i++) {
          $cirugiaTrimestre2 += $sum[$i];
      }

      $cirugiaTrimestre3 = 0;
      for ($i = 7; $i < 10; $i++) {
          $cirugiaTrimestre3 += $sum[$i];
      }

      $cirugiaTrimestre4 = 0;
      for ($i = 10; $i < 13; $i++) {
          $cirugiaTrimestre4 += $sum[$i];
      }

      $cirugiasTrimestres = [$cirugiaTrimestre1, $cirugiaTrimestre2, $cirugiaTrimestre3, $cirugiaTrimestre4];

      $jsonCirugiasTrimestres = json_encode($cirugiasTrimestres);

      //*-----------Fin Sumatoria  de cita de cirugia trimestral------------------------------------------------------------------------------------------------------------------------------
      //*-----------Inicio Sumatoria  de cita de Limpieza Dental trimestral------------------------------------------------------------------------------------------------------------------------------

      $sum = $citaLimpiezaDentalArreglo;
      $limpiezaTrimestre1 = 0;
      for ($i = 1; $i < 4; $i++) {
          $limpiezaTrimestre1 += $sum[$i];
      }

      $limpiezaTrimestre2 = 0;
      for ($i = 4; $i < 7; $i++) {
          $limpiezaTrimestre2 += $sum[$i];
      }

      $limpiezaTrimestre3 = 0;
      for ($i = 7; $i < 10; $i++) {
          $limpiezaTrimestre3 += $sum[$i];
      }

      $limpiezaTrimestre4 = 0;
      for ($i = 10; $i < 13; $i++) {
          $limpiezaTrimestre4 += $sum[$i];
      }

      $limpiezaTrimestres = [$limpiezaTrimestre1, $limpiezaTrimestre2, $limpiezaTrimestre3, $limpiezaTrimestre4];

      $jsonLimpiezasTrimestres = json_encode($limpiezaTrimestres);

      //*-----------Fin Sumatoria  de cita de Limpieza Dental trimestral------------------------------------------------------------------------------------------------------------------------------

      //*-----------Inicio Sumatoria  de cita de servicio trimestral------------------------------------------------------------------------------------------------------------------------------

      $sum = $citasServiciosAnualArreglo;
      $servicioTrimestre1 = 0;
      for ($i = 1; $i < 4; $i++) {
          $servicioTrimestre1 += $sum[$i];
      }

      $servicioTrimestre2 = 0;
      for ($i = 4; $i < 7; $i++) {
          $servicioTrimestre2 += $sum[$i];
      }

      $servicioTrimestre3 = 0;
      for ($i = 7; $i < 10; $i++) {
          $servicioTrimestre3 += $sum[$i];
      }

      $servicioTrimestre4 = 0;
      for ($i = 10; $i < 13; $i++) {
          $servicioTrimestre4 += $sum[$i];
      }

      $servicioTrimestres = [$servicioTrimestre1, $servicioTrimestre2, $servicioTrimestre3, $servicioTrimestre4];

      $jsonServicioTrimestres = json_encode($servicioTrimestres);
      

      
     $pdf = Pdf::loadView('reporte.graficosPDF', compact(
          'nombresServicios',
          'citasVacunaMesActual',
          'citasCirugiaMesActual',
          'citasLimpiezaDentalMesActual',
          'citasServicios',
          'vacunasTrimestres',
          'cirugiasTrimestres',
          'limpiezaTrimestres',
          'servicioTrimestres',
          'consolidadoAnual'
    ));
  
    return $pdf->stream();
      

 }
}