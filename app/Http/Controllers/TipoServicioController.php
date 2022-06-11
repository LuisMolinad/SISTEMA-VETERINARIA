<?php

namespace App\Http\Controllers;

use App\Models\tipoServicio;
use Illuminate\Http\Request;

class TipoServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosTipoServicio['tiposervicios']=tipoServicio::all();
        return view('tiposervicio.index',$datosTipoServicio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tiposervicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTipoServicio = request()->except('_token');
        TipoServicio::insert($datosTipoServicio);
        return redirect('/tiposervicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function show(tipoServicio $tipoServicio)
    {
        //
    }

    public function showId($id){
        $tipoServicio=tipoServicio::find($id);
        return response()->json($tipoServicio);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function edit(tipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipoServicio $tipoServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipoServicio $tipoServicio)
    {
        //
    }
}
