<?php

namespace App\Http\Controllers;

use App\Models\propietario;
use App\Http\Controllers\MascotaController;
use App\Models\expediente;
use App\Models\mascota;
use App\Models\recordatorio;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{

    //TODO CLASE CONTRUC QUE SE NECESITA PARA QUE FUNCIONEN LOS ROLES EN LAS VISTAS
    /*  $citaVacuna = [
        Permission::create(['name' => 'ver-CitaVacuna']),
        Permission::create(['name' => 'editar-CitaVacuna']),
        Permission::create(['name' => 'crear-CitaVacuna']),
        Permission::create(['name' => 'borrar-CitaVacuna']),
    ]; */
    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-Propietario|crear-Propietario|borrar-Propietario|editar-Propietario',
            ['only' => ['index', 'show']]
        );
        $this->middleware('permission:crear-Propietario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-Propietario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-Propietario', ['only' => ['destroy']]);
    }

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
        //return redirect('/propietario?objeto=propietario&accion=creo');
        return redirect('/propietario')->with('success', 'Propietario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $propietario=Propietario::findOrFail($id);
        $mascotas = Mascota::where('propietario_id',$id)->get();
        return view('propietario.show',['propietario'=>$propietario,'mascotas'=>$mascotas]);
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
        
        //Actualizar propietario en recordatorio
        $numeroTelefono = Propietario::where('id','=',$id)->first()->telefonoPropietario;
        $datosRecodartorio = [
            'telefono' => request('telefonoPropietario')
        ];
        recordatorio::where('id_propietario', '=', $id)->update($datosRecodartorio);
        //Fin actualizar propietario en recordatorio

        $datosPropietario = request()->except(['_token', '_method']);
        Propietario::where('id','=',$id)->update($datosPropietario);
        
        return redirect('/propietario')->with('warning', 'Propietario editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Propietario::destroy($id);
        return redirect('/propietario')->with('danger', 'Propietario eliminado correctamente');
    }
}
