<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citaVacuna;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\vacuna;
use Illuminate\Support\Facades\DB;

class gestionCitasVacunacionController extends Controller
{
    /**
     * Muestra los datos de la mascota para la seccion consultar de gestioncitaVacion
     * 
     * 
     */


    public function index($id, $citaVacuna_id)
    {
        $mascotas = mascota::find($id);

        $idcitaVacuna = citaVacuna::find($citaVacuna_id);

        $vacuna = vacuna::find($idcitaVacuna->vacuna_id);

        $idRecordatorio = recordatorio::find($idcitaVacuna->recordatorio_id);
        //return ($idRecordatorio);




        return view('citasvacunas.gestionCitasVacunas.index', compact('mascotas', 'vacuna', 'idcitaVacuna', 'idRecordatorio'));
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


    //Funcion para el boton gestionar, muestra las vacunas de cada mascota, conecta 
    public function show($id)
    {
        //$mascotas = mascota::with('propietario')->get();
        $mascotas = mascota::find($id);

        return view('citasvacunas.gestionCitasVacunas.show', compact('mascotas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $citaVacuna_id)
    {
        $mascotas = mascota::find($id);
        $idcitaVacuna = citaVacuna::find($citaVacuna_id);
        //obtenergo la id de vacuna
        $idVacuna = vacuna::find($idcitaVacuna->vacuna_id);
        // return ($idVacuna);
        //$vacunas = vacuna::all();
        return view('citasvacunas.gestionCitasVacunas.edit', compact('mascotas', 'idVacuna', 'idcitaVacuna'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCita, $idmascota)
    {
        // $datosCitaVacuna = request();
        $citaVacuna = citaVacuna::find($idCita);
        $citaVacuna->start = request('start');
        $citaVacuna->fechaAplicacion = request('end');
        $citaVacuna->update();

        $mascotas = mascota::find($idmascota);

        return view('citasvacunas.gestionCitasVacunas.show', compact('mascotas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($citaVacuna_id)

    {
        //$idcitaVacuna = citaVacuna::find($citaVacuna_id);
        $idcitaVacuna = citaVacuna::find($citaVacuna_id);




        //para eliminar el recordatorio
        //$idRecordatorio = citaVacuna::find($idcitaVacuna->recordatorio_id);
        /*  $idrecortarriodelete = recordatorio::FindOrFail($idRecordatorio)() */
        $idRecordatorio = DB::table('citavacunas')->where('id', '=', $citaVacuna_id)->value('recordatorio_id');
        // return ($idRecordatorio);
        $deleted = DB::table('recordatorios')
            ->where('id', '=', $idRecordatorio)
            ->delete();
        //return ($deleted);

        //saco el id de la mascota antes de eliminar
        $id = mascota::find($idcitaVacuna->mascota_id);
        //borro la cita
        $idcitaVacuna->delete();
        //retorno a la vista show
        // return view('citasvacunas.gestionCitasVacunas.show', compact('mascotas'))->with('warning', 'Mascota eliminada correctamente');
        return redirect()->action([gestionCitasVacunacionController::class, 'show'], ['id' => $id])->with('danger', 'Cita de Vacuna eliminada correctamente');
    }
}
