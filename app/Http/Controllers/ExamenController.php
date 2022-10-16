<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $datosExamen = request()->except('_token');

        $datosExamen['documento']=$request->file('documento')->store('uploads/examenes','public');
        $datosExamen['fecha'] = date('Y-m-d');

        Examen::insert($datosExamen);
        return redirect('/expediente/examenes/'.request('expediente_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function edit(Examen $examen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Examen $examen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examen  $examen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $examen = Examen::FindOrFail($id);
        $expediente = $examen->expediente_id;

        if(Storage::delete('public/'.$examen->documento)){
            Examen::destroy($id);
        }
        return redirect('/expediente/examenes/'.$expediente);
    }
}
