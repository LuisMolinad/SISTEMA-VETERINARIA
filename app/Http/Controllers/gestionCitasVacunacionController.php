<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citaVacuna;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\vacuna;
use Illuminate\Support\Facades\DB;

class gestionCitasVacunacionController extends Controller
{
    /**
     * Muestra los datos de la mascota para la seccion consultar de gestioncitaVacion
     */

    /* public function index($id, $nombreVacuna, $pesolb, $end, $start) */
    public function index($id, $nombreVacuna, $pesolb, $start)
    {
        $mascotas = mascota::find($id);
        //  return view('citasvacunas.gestionCitasVacunas.index', compact('mascota', 'nombreVacuna', 'pesolb', 'end', 'start'));
        return view('citasvacunas.gestionCitasVacunas.index', compact('mascotas', 'nombreVacuna', 'pesolb', 'start'));
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


    //Funcion para el boton gestionar, muestra las vacunas de cada mascota, conecta 
    public function show($id)
    {
        //$mascotas = mascota::with('propietario')->get();
        $mascotas = mascota::find($id);

        return view('citasvacunas.gestionCitasVacunas.show', compact('mascotas'));
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
