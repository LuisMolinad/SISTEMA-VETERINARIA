<?php

namespace App\Http\Controllers;

use App\Models\vacuna;
use App\Models\especie;
use Illuminate\Http\Request;
use Illuminate\Console\Command;

class VacunaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */

    //Para roles y permisos

    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-Vacuna|crear-Vacuna|consultar-Vacuna|editar-Vacuna|borrar-Vacuna',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-Vacuna', ['only' => ['create', 'store']]); //crear vacuna
        $this->middleware('permission:consultar-Vacuna', ['only' => ['show']]); //consultar vacuna
        $this->middleware('permission:editar-Vacuna', ['only' => ['edit', 'update']]); //actualiza vacuna
        $this->middleware('permission:borrar-Vacuna', ['only' => ['destroy']]); //eliminar vacuna
    }

    // Función para mostrar las diferentes vacunas
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
    // Funcion para cargar la vista de crear vacuna
    public function create()
    {
        $especies = especie::all();
        // return view('vacuna.create');
        return view('vacuna.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Función para guardar una vacuna desde vacuna.create
    public function store(Request $request)
    {
        $datosVacuna = request()->except(['_token','especies']);
        Vacuna::insert($datosVacuna);
        $vacunaIngresada = Vacuna::latest('id')->first();
        $especies_vacuna = $request->input('especies');
        $vacunaIngresada->especie()->sync($especies_vacuna);
        return redirect('/vacuna')->with('success', 'Vacuna creada correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    //Funcion para mostrar una vacuna en la vista vacuna.show
    public function show($id)
    {
        $vacuna=vacuna::findOrFail($id);
        return view('vacuna.show', ['vacuna'=>$vacuna]);
    }
    //Función para recuperar una vacuna en json
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

     //Función para cargar la vista vacuna.edit
    public function edit($id)
    {
        $vacuna = vacuna::find($id);
        $especies = especie::all();
        return view('vacuna.edit',compact('vacuna','especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    // Función para actualizar una vacuna, se usa desde la vista vacuna.edit, y desde los botones
    //  habilitar y deshabilitar del index de vacuna.
    public function update(Request $request, $id, $accion)
    {
        //Selectiva para determinar si la edicion corresponde a editar vacuna, deshabilitar vacuna, o habilitar vacuna
        //y poder retornar un aviso correspondiente al momento de redireccionar al index.
        if ($accion == "editar"){
            $datosVacuna = request()->except(['_token','_method','especies']);
            vacuna::where('id','=',$id)->update($datosVacuna);
            $vacuna = Vacuna::findorFail($id);
            $especies_vacuna = $request->input('especies');
            $vacuna->especie()->sync($especies_vacuna);
            return redirect('/vacuna')->with('warning','Se ha editado la vacuna correctamente');
        } elseif ($accion == "deshabilitar"){
            $datosVacuna = request()->except(['_token','_method','especies']);
            vacuna::where('id','=',$id)->update($datosVacuna);
            return redirect('/vacuna')->with('warning','Se ha deshabilitado la vacuna correctamente');
        } else {
            $datosVacuna = request()->except(['_token','_method','especies']);
            vacuna::where('id','=',$id)->update($datosVacuna);
            return redirect('/vacuna')->with('warning','Se ha habilitado la vacuna correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vacuna  $vacuna
     * @return \Illuminate\Http\Response
     */
    //Funcion para destruir una vacuna.
    public function destroy($id)
    {
        Vacuna::destroy($id);
        return redirect('/vacuna')->with('danger','Se ha eliminado la vacuna correctamente');
    }
}
