<?php

namespace App\Http\Controllers;


use App\Models\citaVacuna;
use App\Models\citaCirugia;
use App\Models\citaLimpiezaDental;
use App\Models\citaServicio;
use Carbon\Carbon; //para manejar fechas
use App\Models\tipoServicio;

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

        /*    //utlmos 4 meses
        $ultimoTrimestre = $now->subMonths(4);
        $ultimoTrimestreInicio = $ultimoTrimestre->month;
 */
        //capturando los datos, deben ser correspondiente al mes en curso
        $citasVacunaMesActual = citaVacuna::whereMonth('fechaAplicacion', $mesEnCurso)->get()->count();
        $citasCirugiaMesActual = citaCirugia::whereMonth('start', $mesEnCurso)->get()->count();
        $citasLimpiezaDentalMesActual = citaLimpiezaDental::whereMonth('start', $mesEnCurso)->get()->count();
        //cita servicios
        $citasServicios = citaServicio::whereMonth('start', $mesEnCurso)->get()->count();

        //mostramos el valor
        // var_dump($citasVacunaMesActual);

        //*TODO Propesta 1 agrupa todo por arreglos

        //*La idea es englobar todo esto en un array tipo calendario = [ enero, febrero,...] algo similar a un arreglo de arreglos 
        //*La idea es englobar todo esto en un array tipo calendario = [ enero, febrero,...] luego ese arreglo se recorre en la vista

        //*TODO PRIMER TRIMESTRE Enero a Marzo, SEGUNDO TRIMESTRE: Abril a Junio, TERCER TRIMESTRE Julio a Septiembre, CUARTO TRIMESTRE: Octubre a Diciembre



        //*TODO Propesta 2 agrupa todo por arreglos

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



        //*-----------Sumatoria de citas de vacuna anual------------------------------------------------------------------------------------------------------------------------------
        $numeros = $citaVacunaArreglo;
        $sumaVacuna = 0;
        foreach ($numeros as $numero) {
            $sumaVacuna += $numero;
        }


        //*-----------Sumatoria de citas de cirugía anual------------------------------------------------------------------------------------------------------------------------------
        $numeros = $citaCirugiaArreglo;
        $sumaCirugia = 0;
        foreach ($numeros as $numero) {
            $sumaCirugia += $numero;
        }

        //*-----------Sumatoria de citas de limpieza dental  anual------------------------------------------------------------------------------------------------------------------------------
        $numeros = $citaLimpiezaDentalArreglo;
        $sumaLimpiezaDental = 0;
        foreach ($numeros as $numero) {
            $sumaLimpiezaDental += $numero;
        }

        //*-----------Sumatoria de citas de servicio  anual------------------------------------------------------------------------------------------------------------------------------
        $numeros = $citasServiciosAnualArreglo;
        $sumaServicios = 0;
        foreach ($numeros as $numero) {
            $sumaServicios += $numero;
        }


        // echo ($suma);
        // return ($citaVacunaArreglo);




        return view('reporte.index', compact('nombresServicios', 'citasVacunaMesActual', 'citasCirugiaMesActual', 'citasLimpiezaDentalMesActual', 'citasServicios',
        'sumaVacuna','sumaCirugia','sumaLimpiezaDental','sumaServicios'));
    }
}
