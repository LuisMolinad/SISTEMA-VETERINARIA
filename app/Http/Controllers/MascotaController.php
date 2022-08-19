<?php

namespace App\Http\Controllers;

use App\Models\mascota;
use App\Models\propietario;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Models\expediente;
use Exception;

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
    public function create($id)
    {
        $propietario = propietario::FindOrFail($id);
        return view('mascota.create', compact('propietario'));
    }

    public function crear($id)
    {
        $propietario = propietario::FindOrFail($id);
        return view('mascota.create', compact('propietario'));
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

        $datosExpediente = 
            [
                'mascota_id' => Mascota::max('id'),
            ];

        Expediente::insert($datosExpediente);
        
        return redirect('/mascota/msg/guardar');
    }

    public function mostrar_guardar(){
        return redirect('/mascota')->with('success', 'Mascota creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::FindOrFail($id);
        return view('mascota.show', compact('mascota'));
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
        Mascota::where('id','=',$id)->update($datosMascota);
        
        return redirect('/mascota/msg/editar');
    }

    public function mostrar_editar(){
        return redirect('/mascota')->with('warning', 'Mascota editada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //*Borramos el expediente
/*         $Expediente = Expediente::where('mascota_id',$id);
        $Expediente->delete(); */

        Mascota::destroy($id);

        //return redirect('/mascota?objeto=mascota&accion=elimino');
        return redirect('/mascota')->with('danger', 'Mascota eliminada correctamente');
    }

    //Ejemplo consultar JS
    public function consultar($codigo){        
        //return response()->json($codego)->header('Content-Type','application/json');
        $vari = Mascota::where('idMascota',$codigo)->count();
        return json_encode($vari);
    }

    public function mostrar_por_propietario($id){
        $vari = Mascota::where('propietario_id',$id)->get();
        return json_encode($vari);
    }

    //consultar id mascota para la agenda.
    public function showId($id){
        $mascota=mascota::find($id);
        return response()->json($mascota);
    }

}