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
     * 
     * 
     */


    public function index($id, $citaVacuna_id)
    {
        $mascotas = mascota::find($id);

        $idcitaVacuna = citaVacuna::find($citaVacuna_id);

        $vacuna = vacuna::find($idcitaVacuna->vacuna_id);



        return view('citasvacunas.gestionCitasVacunas.index', compact('mascotas', 'vacuna', 'idcitaVacuna'));
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
        $mascotas = mascota::find($id);
        $vacunas = vacuna::all();
        return view('citasvacunas.gestionCitasVacunas.edit', compact('mascotas', 'vacunas'));
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
