<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use Illuminate\Http\Request;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosExpediente['expedientes'] =expediente::all();
        return view('expediente.index',$datosExpediente);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expediente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosExpediente = request()->except('_token');
        Expediente::insert($datosExpediente);
        return redirect('/expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(expediente $expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::FindOrFail($id);
        return view('expediente.edit', compact('expediente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosExpediente = request()->except(['_token', '_method']);
        Expediente::where('id','=',$id)->update($datosExpediente);
        $expediente = Expediente::FindOrFail($id);
        return redirect('/expediente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expediente::destroy($id);
        return redirect('/expediente');
    }
}
