<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use PDF;

class CitaCirugiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = mascota::with('propietario')->get();
        // $propietarios = propietario::with('mascotas')->get();
                                                 //aca se van as variables de arriba
         return view(('Cirugia.GestionarCirugia'),compact('mascotas'));
       // $citaCirugia = Cirugia::paginate();

    }

    /*Para el PDF */
    public function pdf($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $pdf = PDF::loadView('Cirugia.pdf' ,['mascotas'=>$mascotas]);
      //  $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return view('Cirugia.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*
                $propietario = Propietario::FindOrFail($id);
        return view('propietario.edit', compact('propietario'));
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $datoscirugia = request()->except('_token');
      citaCirugia ::insert($datoscirugia);
      return redirect('/citacirugia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function show(citaCirugia $citaCirugia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function edit(citaCirugia $citaCirugia)
    {
        //
    }

    public function mostrar($id){
        //$mascotas = mascota::FindOrFail($id);
      //  return view('Cirugia.CrearCirugia',compact('mascotas'));
       
    /*  public function show($id)
{
    $item = MenuItem::with('variant')->findOrFail($id);
    return $item;
}*/
        $mascotas=mascota::with('propietario')->findOrFail($id);

        return view('Cirugia.CrearCirugia',compact('mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citaCirugia $citaCirugia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function destroy(citaCirugia $citaCirugia)
    {
        //
    }
}
