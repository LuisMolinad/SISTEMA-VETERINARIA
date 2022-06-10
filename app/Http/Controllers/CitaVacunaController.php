<?php

namespace App\Http\Controllers;

use App\Models\citaVacuna;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
class CitaVacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lo que va dentro del with tiene que ser igual al metodo que esta dentro del model mascota, es el que define la relacion hace ctrl + click al
        // model y alla te explico
        $mascotas = mascota::with('propietario')->get();
       // $propietarios = propietario::with('mascotas')->get();
                                                //aca se van as variables de arriba
        return view(('citasvacunas.index'),compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citasvacunas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $datosCita = request()->except('_token');
      citaVacuna ::insert($datosCita);
      return response()->json($datosCita);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function show(citaVacuna $citaVacuna)
    {
       // return view('citasVacunas.gestionarCitasVacunacion');
       $citaVacuna = citaVacuna::all();
       return response()->json($citaVacuna);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function edit(citaVacuna $citaVacuna)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citaVacuna $citaVacuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(citaVacuna $citaVacuna)
    {
        //
    }
}
