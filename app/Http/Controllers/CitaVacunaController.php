<?php

namespace App\Http\Controllers;

use App\Models\citaVacuna;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\vacuna;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CitaVacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view(('citasvacunas.index'),compact('mascotas'));
    }


    public function create()
    {

        //return view('citasvacunas.create', compact('vacunas') );
    }




    public function mostrar($id){
        $mascotas = mascota::FindOrFail($id);
        $vacunas = vacuna::all();
        return view('citasvacunas.create',compact('mascotas','vacunas'));
        //return view('Cirugia.CrearCirugia');
    }

    public function validar($id){
       // $mascotas = mascota::FindOrFail($id);

        $idmascotas=DB::table('mascotas')->select('id')->get();


        return view('citasvacunas.store',compact('mascotas'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $datosCita = request()->except('_token','idVisible','end');

      citaVacuna ::insert($datosCita);
      //return response()->json($datosCita);
      //echo '<script language="javascript">alert("juas");</script>';
      return redirect('/');
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
    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaVacuna = citaVacuna::find($id);
        $citaVacuna->start=Carbon::createFromFormat('Y-m-d H:i:s', $citaVacuna->start)->format('Y-m-d');
        return response()->json($citaVacuna);
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
