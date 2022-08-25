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
        return redirect('/vacuna');
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
    public function update(Request $request, $id)
    {
        $datosVacuna = request()->except(['_token','_method']);
        vacuna::where('id','=',$id)->update($datosVacuna);
        return \redirect('/vacuna');
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
