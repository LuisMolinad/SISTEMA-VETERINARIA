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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //$mascotas = mascota::with('propietario')->get();
        $mascotas = mascota::find($id);
        // $vacunas = vacuna::with('vacuna')->get();

        //Creo que cita vacuna debo llamar todo y llamar lo que necesito por medio de las relaciones que hay en los m[etodos de cada uno]
        // $citaVacunas = citaVacuna::where('mascota_id', $mascotas->id)->get();
        // $citaVacunas = citaVacuna::find(1);
        // $citaVacunas = citaVacuna::all();
        // $vacuna = vacuna::where('id', $citaVacunas)->get('nombreVacuna');
        /*  foreach ($mascotas->citaVacunas as  $citaVacuna) {
            return ($citaVacuna->nombreVacuna);
        } */



        //Flight::where('active', 1)
        /*  foreach ($citaVacuna as $vacuna)
            return var_dump($vacuna->vacunas->nombreVacuna); */
        return view('citasvacunas.gestionCitasVacunas.index', compact('mascotas'));
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
