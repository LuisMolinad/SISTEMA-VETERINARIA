<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosMascota['mascotas'] = mascota::all();
        return view('mascota.index', $datosMascota);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosMascota = request()->except('_token');
        Mascota::insert($datosMascota);
        return redirect('/mascota');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::FindOrFail($id);
        return view('mascota.edit', compact('mascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosMascota = request()->except(['_token', '_method']);
        //$datosMascota = request()->all();
        Mascota::where('id','=',$id)->update($datosMascota);
        $mascota = Mascota::FindOrFail($id);
        return redirect('/mascota');
        //return response()->json($datosMascota);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mascota::destroy($id);
        return redirect('/mascota');
    }
}
