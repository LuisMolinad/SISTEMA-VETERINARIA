<?php

namespace App\Http\Controllers;


use App\Models\citaVacuna;
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


        //capturando los datos, deben ser correspondiente al mes en curso
        $citasVacunaMesActual = citaVacuna::whereMonth('fechaAplicacion', $mesEnCurso)->get()->count();
        //mostramos el valor
        var_dump($citasVacunaMesActual);

        return view('reporte.index', compact('nombresServicios', 'citasVacunaMesActual'));
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
