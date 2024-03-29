<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\record_vacunacion;
use App\Models\vacuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class RecordVacunacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        /*  $RecordVacunacion = [
            Permission::create(['name' => 'ver-RecordVacunacion']),
            Permission::create(['name' => 'editar-RecordVacunacion']),
            Permission::create(['name' => 'crear-RecordVacunacion']),
            Permission::create(['name' => 'borrar-RecordVacunacion']),
            Permission::create(['name' => 'consultar-RecordVacunacion']),
        ]; */
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-RecordVacunacion|crear-RecordVacunacion|borrar-RecordVacunacion|editar-RecordVacunacion',
            ['only' => ['index', 'show']]
        );
        $this->middleware('permission:crear-RecordVacunacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-RecordVacunacion', ['only' => ['edit_table_fecha', 'edit_table_refuerzo', 'edit_table_peso']]);
        $this->middleware('permission:borrar-RecordVacunacion', ['only' => ['destroy']]);
    }



    public function index()
    {
        $id = request('i');

        $especie_id = expediente::all()->where('id', $id)->first()->mascota->especie_id;
        $especie_vacunas = DB::table('especie_vacuna')->get()->where('especie_id', $especie_id);

        $datos = [
            'vacunas' => vacuna::all(),
            'expediente' => expediente::all()->where('id', $id)->first(),
            'record' => record_vacunacion::all()->where('expediente_id', $id),
            'especie_vacunas' => $especie_vacunas,
            'especie_id' => $especie_id
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
        return redirect('/record?i=' . request('expediente_id'))->with('success', 'Registro guardado correctamente');
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
        $record = record_vacunacion::findOrFail($id);
        record_vacunacion::destroy($id);
        return redirect('/record?i=' . $record->expediente_id)->with('danger', 'Registro eliminado correctamente');
    }

    public function edit_table_fecha()
    {
        $datos = [
            'fecha' => request('fecha')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }

    public function edit_table_refuerzo()
    {
        $datos = [
            'refuerzo' => request('refuerzo')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }

    public function edit_table_peso()
    {
        $datos = [
            'peso' => request('peso')
        ];

        $id = request('id');

        record_vacunacion::where('id', $id)->update($datos);
    }

    public function cartillapdf($id)
    {
        $expediente = expediente::FindOrFail($id);
        //Recuperando registros de vacunacion segun los mostrados en la cartilla
        $rabia = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 1)->take(-3);
        $parvovirus = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 2)->take(-3);
        $parasitos = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 3)->take(-3);
        $moquillo = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 4)->take(-3);
        $leucemia = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 5)->take(-3);
        $triple = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', 6)->take(-3);
        //en "otras" se recuperaran todas las vacunas que no sean las recuperadas antereriormente
        $otras = DB::table('record_vacunacions')->get()->where('expediente_id', $id)->where('vacuna_id', '<>', 1)->where('vacuna_id', '<>', 2)->where('vacuna_id', '<>', 3)->where('vacuna_id', '<>', 4)->where('vacuna_id', '<>', 5)->where('vacuna_id', '<>', 6)->take(-3);
        $vacunas = DB::table('vacunas')->get();
        // $vacunas=vacuna::all();
        $pdf = PDF::loadView('expediente.record_vacunacion.cartillapdf', ['expediente' => $expediente, 'rabia' => $rabia, 'parvovirus' => $parvovirus, 'parasitos' => $parasitos, 'moquillo' => $moquillo, 'leucemia' => $leucemia, 'triple' => $triple, 'otras' => $otras, 'vacunas' => $vacunas]);
        return $pdf->stream();
    }
}
