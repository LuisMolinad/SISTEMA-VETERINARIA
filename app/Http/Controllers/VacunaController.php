<?php

namespace App\Http\Controllers;

use App\Models\vacuna;
use Illuminate\Http\Request;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosVacuna['vacunas']=vacuna::all();
        return view('vacuna.index',$datosVacuna);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vacuna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosVacuna = request()->except('_token');
        Vacuna::insert($datosVacuna);
        return redirect('/vacuna')->with('success', 'Vacuna creada correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vacuna=vacuna::findOrFail($id);
        return view('vacuna.consultar', ['vacuna'=>$vacuna]);
    }
    public function showId($id){
        $vacuna=vacuna::find($id);
        return response()->json($vacuna);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vacuna = vacuna::find($id);
        return view('vacuna.edit',compact('vacuna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $accion)
    {
        $datosVacuna = request()->except(['_token','_method']);
        vacuna::where('id','=',$id)->update($datosVacuna);
        // if ($accion == 0){
        //     $mensaje = "Vacuna habilitada correctamente";
        // } elseif ($accion == 1){
        //     $mensaje = "Vacuna habilitada correctamente";
        // } else {
        //     $mensaje = "Vacuna habilitada correctamente";
        // }
        // return redirect('/vacuna')->with('success',$mensaje);
        if ($accion == "editar"){
            return redirect('/vacuna')->with('warning','Se ha editado la vacuna correctamente');
        } elseif ($accion == "deshabilitar"){
            return redirect('/vacuna')->with('warning','Se ha deshabilitado la vacuna correctamente');
        } else {
            return redirect('/vacuna')->with('warning','Se ha habilitado la vacuna correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(vacuna $vacuna)
    {
        //
    }
}
