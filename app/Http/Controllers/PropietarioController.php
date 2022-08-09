<?php

namespace App\Http\Controllers;

use App\Models\propietario;
use App\Http\Controllers\MascotaController;
use App\Models\expediente;
use App\Models\mascota;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosPropietario['propietarios'] = propietario::all();

        return view('propietario.index',$datosPropietario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosPropietario = request()->except('_token');
        Propietario::insert($datosPropietario);
        return redirect('/propietario?objeto=propietario&accion=creo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $propietario = Propietario::FindOrFail($id);
        return view('propietario.edit', compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosPropietario = request()->except(['_token', '_method']);
        Propietario::where('id','=',$id)->update($datosPropietario);
        $propietario = Propietario::FindOrFail($id);
        return redirect('/propietario?objeto=propietario&accion=edito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
/*         $Mascota = mascota::where('propietario_id', $id);
        $mascota_get = mascota::where('propietario_id', $id)->value('id');

        $expediente = expediente::where('mascota_id', $mascota_get);
        $expediente->delete();

        $Mascota->delete(); */
        Propietario::destroy($id);
        return redirect('/propietario?objeto=propietario&accion=elimino');
    }
}
