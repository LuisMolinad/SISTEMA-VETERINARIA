<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vacuna;
use App\Models\mascota;

use Barryvdh\DomPDF\Facade\Pdf;

//Para obtener fecha
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class defuncionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /* 
        El siguiente metodo es utilizado para diferentes tareas
        1. Cargar los datos del duenio con mascota
        2. devolver a la vista dichos campos relacionados con duenio y mascota

     */
    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view(('Actas.index'), compact('mascotas'));
        // return view('Actas.index');
    }
    /* 
        El siguiente metodo es utilizado para diferentes tareas en la vista DEL PDF ACTAS.PDF
        1. Cargar un pdf con los datos obtenidos de la relacion de mascotas con duenio
        2. Captura el id de la mascota seleccionada y actualiza el estado de esta a fallecido
        3. Fecha de elaboracion del acta de defuncion ()

     */
    public function pdf($id)
    {


        /*  fecha de elaboracion */
        $dt = Carbon::now()->locale('es_ES')->isoFormat('dddd D MMMM YYYY');



        //Obtengo los datos de mascota
        $mascotas = mascota::FindOrFail($id);

        //Capturo el id de la mascota seleccionada
        $idFallecido = $mascotas->id;

        //Actualizo el campo
        $affected = DB::table('mascotas')
            ->where('id', $idFallecido)
            ->update(['fallecidoMascota' => 'Fallecido']);
        //Se cargan los datos 
        $pdf = Pdf::loadView('Actas.pdf', ['mascotas' => $mascotas, 'dt' => $dt]);
        return $pdf->stream();
        //return view('Actas.pdf',compact('mascotas'));

    }

    public function create()
    {
        //return view('Actas.create');
    }
    /* 
        El siguiente metodo es utilizado para diferentes tareas en la vista ACTAS.CREATE
        1. Cargar los datos obtenidos de la relacion de mascotas con duenio
     */
    public function mostrar($id)
    {

        $mascotas = mascota::FindOrFail($id);
        //$vacunas = vacuna::all();
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
