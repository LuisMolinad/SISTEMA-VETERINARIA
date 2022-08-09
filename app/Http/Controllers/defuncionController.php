<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vacuna;
use App\Models\mascota;

use PDF;

//Para obtener fecha
use Carbon\Carbon;

class defuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view(('Actas.index'), compact('mascotas'));
        // return view('Actas.index');
    }
    public function pdf($id)
    {


        /*  fecha de elaboracion */
        $dt = Carbon::now()->locale('es_ES')->isoFormat('dddd D MMMM YYYY');


        //$mascotas = mascota::with('propietario')->get();
        $mascotas = mascota::FindOrFail($id);

        $pdf = PDF::loadView('Actas.pdf', ['mascotas' => $mascotas, 'dt' => $dt]);
        return $pdf->stream();
        //return view('Actas.pdf',compact('mascotas'));

    }

    public function create()
    {
        //return view('Actas.create');
    }

    public function mostrar($id)
    {

        $mascotas = mascota::FindOrFail($id);
        $vacunas = vacuna::all();
        return view('Actas.create', compact('mascotas'));
        //return view('Cirugia.CrearCirugia');
    }


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
