<?php

namespace App\Http\Controllers;

use App\Models\lineaHistorial;
use Illuminate\Http\Request;
use App\Http\Controllers\ExpedienteController;
use App\Models\expediente;

class LineaHistorialController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lineaHistorial  $lineaHistorial
     * @return \Illuminate\Http\Response
     */
    public function show(lineaHistorial $lineaHistorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lineaHistorial  $lineaHistorial
     * @return \Illuminate\Http\Response
     */
    public function edit(lineaHistorial $lineaHistorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lineaHistorial  $lineaHistorial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lineaHistorial $lineaHistorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lineaHistorial  $lineaHistorial
     * @return \Illuminate\Http\Response
     */
    public function destroy($lineaHistorial)
    {
        $idLineaHistorial = lineaHistorial::find($lineaHistorial);
        $id = expediente::find($idLineaHistorial->expediente_id);
        $idLineaHistorial->delete();
        
        //Cambiar esta linea
        return redirect()->action([ExpedienteController::class, 'gestionar_historial_Medico'], ['id' => $id])->with('danger', 'Diagnostico eliminado correctamente');
    }

    public function fetch(){

        $datos = [
            'expediente_id' => request('expediente_id'),
            'textoLineaHistorial' => request('textoLineaHistorial'),
            'fechaLineaHistorial' => date('Y-m-d'),
        ];

        lineaHistorial::insert($datos);

        
    }

    public function edit_editable(){
        
        $datos = [
            'textoLineaHistorial' => request('textoLineaHistorial')
        ];

        $id = request('id');

        lineaHistorial::where('id',$id)->update($datos);
    }
}
