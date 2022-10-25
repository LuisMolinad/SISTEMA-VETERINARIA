<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\record_vacunacion;
use App\Models\vacuna;
use Illuminate\Http\Request;

class RecordVacunacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = request('i');
        $datos = [
            'vacunas'=>vacuna::all(),
            'expediente' => expediente::all()->where('id', $id)->first(),
            'record' => record_vacunacion::all()->where('expediente_id', $id)
        ];
        return view('expediente.record_vacunacion.index', compact('datos'));
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
        $datos = request()->except('_token');
        record_vacunacion::insert($datos);
        return redirect('/record?i='.request('expediente_id'))->with('success', 'Registro guardado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\record_vacunacion  $record_vacunacion
     * @return \Illuminate\Http\Response
     */
    public function show(record_vacunacion $record_vacunacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\record_vacunacion  $record_vacunacion
     * @return \Illuminate\Http\Response
     */
    public function edit(record_vacunacion $record_vacunacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\record_vacunacion  $record_vacunacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, record_vacunacion $record_vacunacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\record_vacunacion  $record_vacunacion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        record_vacunacion::destroy($id);
        return redirect('/record?i='.$id)->with('danger', 'Registro eliminado correctamente');
    }

    public function edit_table_fecha(){
        $datos = [
            'fecha' => request('fecha')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }

    public function edit_table_refuerzo(){
        $datos = [
            'refuerzo' => request('refuerzo')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }

    public function edit_table_peso(){
        $datos = [
            'peso' => request('peso')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }
}