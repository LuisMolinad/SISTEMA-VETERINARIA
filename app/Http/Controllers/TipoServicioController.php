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
    // Función para mostrar los diferentes tipos de servicios
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
    // Funcion para cargar la vista de crear tipo de servicio
    public function create()
    {
        return view('tiposervicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Función para guardar un tipo de servicio desde la vista tiposervicio.create 
    public function store(Request $request)
    {
        $datosTipoServicio = request()->except('_token');
        TipoServicio::insert($datosTipoServicio);
        // return redirect('/tiposervicio');
        $accion="guardar";
        $objeto="tipo servicio";
        $datosTipoServicio['tiposervicios']=tipoServicio::all();
        return redirect('/tiposervicio')->with('success', 'Tipo de servicio creado correctamente');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    //Funcion para mostrar un tipo de servicio en la vista tiposervicio.show
    public function show($id)
    {
        $tipoServicio=tipoServicio::findOrFail($id);
        return view('tiposervicio.show', ['tipoServicio'=>$tipoServicio]);
    }

    //Función para recuperar un tipo de servicio por su id, se retorna un json.
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

    //Función para mostrar la vista tiposervicio.edit
    public function edit($id)
    {
        $tipoServicio = tipoServicio::find($id);
        return view('tiposervicio.edit',compact('tipoServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */

    // Función para actualizar un tipo de servicio, se usa desde la vista tiposervicio.edit, y desde los botones
    //  habilitar y deshabilitar.
    public function update(Request $request, $id,$accion)
    {
        $datosTipoServicio = request()->except(['_token','_method']);
        TipoServicio::where('id','=',$id)->update($datosTipoServicio);
        //Selectiva para determinar si la edicion corresponde a editar el servicio, deshabilitar el servicio, o habilitar el servicio
        //y poder retornar un aviso correspondiente al momento de redireccionar al index.
        if ($accion == "editar"){
            return redirect('/tiposervicio')->with('warning','Se ha editado el tipo de servicio correctamente');
        } elseif ($accion == "deshabilitar"){
            return redirect('/tiposervicio')->with('warning','Se ha deshabilitado el tipo de servicio correctamente');
        } else {
            return redirect('/tiposervicio')->with('warning','Se ha habilitado el tipo de servicio correctamente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipoServicio  $tipoServicio
     * @return \Illuminate\Http\Response
     */
    //Funcion para destruir un tipo de servicio.
    public function destroy($id)
    {
        TipoServicio::destroy($id);
        return redirect('/tiposervicio')->with('danger','Se ha eliminado el tipo de servicio correctamente');
    }
}
