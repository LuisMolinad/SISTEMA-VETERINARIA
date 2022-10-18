<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\mascota;
use App\Models\Examen;
use App\Models\lineaHistorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;
//use Barryvdh\DomPDF\Facade as PDF;

class ExpedienteController extends Controller
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
        /*
        $datosExpediente['expedientes'] =expediente::all();
        return view('expediente.index',$datosExpediente);
        */
        $expedientes = expediente::with('mascota')->get();
        return view(('expediente.index'), compact('expedientes'));
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

    public function crear($id)
    {
        $mascota = mascota::FindOrFail($id);
        return view('expediente.create', compact('mascota'));
        //return view('mascota.create');
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
        //return redirect('/expediente?objeto=expediente&accion=creo');
        return redirect('/expediente')->with('success', 'Expediente creado correctamente');
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

    public function pdfConverter($id){
        $expediente = expediente::FindOrFail($id);
        $linea = lineaHistorial::all()->where('expediente_id','=',$id);
        $datos = [
            'expediente' => $expediente,
            'linea' => $linea
        ];
        $pdf = PDF::loadView('expediente.pdf', ['datos'=>$datos]);
        return $pdf->stream();
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
        //return redirect('/expediente?objeto=expediente&accion=edito');
        return redirect('/expediente')->with('warning', 'El expediente se edito correctamente');
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
        return redirect('/expediente?objeto=expediente&accion=elimino');
    }

    public function gestionar_historial_Medico($id){
        $expediente = expediente::FindOrFail($id);
        return view('expediente.historial_medico', compact('expediente'));
    }

    public function examenes($id){
        
        $expediente = expediente::where('id', '=', $id)->first();

        $datos = [
            "expediente" => $expediente,
            "examenes" => Examen::all()->where('expediente_id', '=', $id),
            "mascota" => mascota::where('id', '=', $expediente->mascota_id)->first()
        ];

        return view('expediente.examenes.index', compact('datos'));
        // return response()->json($datos);
    }
}
