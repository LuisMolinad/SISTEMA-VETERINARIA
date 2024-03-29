<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\citaVacuna;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\vacuna;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class gestionCitasVacunacionController extends Controller
{

    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:consultar-CitaVacuna|editar-CitaVacuna|borrar-CitaVacuna|gestionar-CitaVacuna',
            ['only' => ['index']]
        );
        /* $this->middleware('permission:crear-CitaVacuna', ['only' => ['create', 'store']]); */
        $this->middleware('permission:gestionar-CitaVacuna', ['only' => ['show']]);
        $this->middleware('permission:editar-CitaVacuna', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-CitaVacuna', ['only' => ['destroy']]);
    }



    /**
     * TODO Muestra los datos de la mascota para la seccion consultar de gestioncitaVacion
    
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


    //TODO Funcion para el boton gestionar, muestra las vacunas de cada mascota, conecta 
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
        $idcitaVacuna = citaVacuna::FindOrFail($citaVacuna_id);
        //var_dump($idcitaVacuna);
        //recordatorio tupla id
        $recordatorio = recordatorio::where('id', $idcitaVacuna->recordatorio_id)->first(); //id recordatorio
        //var_dump($recordatorio->dias_de_anticipacion);
        //obtenergo la id de vacuna
        $idVacuna = vacuna::find($idcitaVacuna->vacuna_id);



        //$vacunas = vacuna::all();
        return view('citasvacunas.gestionCitasVacunas.edit', compact('mascotas', 'idVacuna', 'idcitaVacuna', 'recordatorio'));
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

        //dias de anticipaci[on
        $dias_de_anticipacion = request('dias_de_anticipacion');

        // $datosCitaVacuna = request();
        $citaVacuna = citaVacuna::find($idCita);

        //capturo el id recordatorio
        $idRecordatorio = $citaVacuna->recordatorio_id;




        //  return ($idRecordatorio);
        $fechaCita =   $citaVacuna->start = request('start');
        $citaVacuna->fechaAplicacion = request('end');
        $citaVacuna->update();


        $update = DB::table('recordatorios')
            ->where('id', '=', $idRecordatorio)
            ->update(['dias_de_anticipacion' => $dias_de_anticipacion, 'fecha' => $fechaCita]);



        $id = mascota::find($citaVacuna->mascota_id);
        return redirect()->action([gestionCitasVacunacionController::class, 'show'], ['id' => $id])->with('warning', 'La cita de vacunación ha sido actualizada correctamente!');
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

        $idRecordatorio = DB::table('citaVacunas')->where('id', '=', $citaVacuna_id)->value('recordatorio_id');


        $idcitaVacuna->delete();

        DB::table('recordatorios')
            ->where('id', '=', $idRecordatorio)
            ->delete();
        //return ($deleted);

        //saco el id de la mascota antes de eliminar
        $id = mascota::find($idcitaVacuna->mascota_id);
        //borro la cita

        //retorno a la vista show
        return redirect()->action([gestionCitasVacunacionController::class, 'show'], ['id' => $id])->with('danger', 'La cita de vacunación ha sido eliminada correctamente!');
    }
}
