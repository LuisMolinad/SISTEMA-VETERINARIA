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


        //capturando los datos, deben ser correspondiente a los trimestres, 

        //*TODO PRIMER TRIMESTRE Enero a Marzo, SEGUNDO TRIMESTRE: Abril a Junio, TERCER TRIMESTRE Julio a Septiembre, CUARTO TRIMESTRE: Octubre a Diciembre


        //*Primer trimestre
        //*Enero
        $citasVacunaEnero = citaVacuna::whereMonth('fechaAplicacion', $now->month(1)->format('m'))->get()->count();
        $citasCirugiaEnero = citaCirugia::whereMonth('start', $now->month(1)->format('m'))->get()->count();
        $citasLimpiezaDentalEnero = citaLimpiezaDental::whereMonth('start',  $now->month(1)->format('m'))->get()->count();
        $citasServiciosEnero = citaServicio::whereMonth('start',  $now->month(1)->format('m'))->get()->count();
        //*Febrero
        $citasVacunaFebrero = citaVacuna::whereMonth('fechaAplicacion', $now->month(2)->format('m'))->get()->count();
        $citasCirugiaFebrero = citaCirugia::whereMonth('start', $now->month(2)->format('m'))->get()->count();
        $citasLimpiezaDentalFebrero = citaLimpiezaDental::whereMonth('start',  $now->month(2)->format('m'))->get()->count();
        $citasServiciosFebrero = citaServicio::whereMonth('start',  $now->month(2)->format('m'))->get()->count();


        /* 
        $citasCirugiaMesActual = citaCirugia::whereMonth('start', $mesEnCurso)->get()->count();
        $citasLimpiezaDentalMesActual = citaLimpiezaDental::whereMonth('start', $mesEnCurso)->get()->count();
        //cita servicios
        $citasServicios = citaServicio::whereMonth('start', $mesEnCurso)->get()->count(); */

        //return ($citasVacunaEnero);






        return view('reporte.index', compact('nombresServicios', 'citasVacunaMesActual', 'citasCirugiaMesActual', 'citasLimpiezaDentalMesActual', 'citasServicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
