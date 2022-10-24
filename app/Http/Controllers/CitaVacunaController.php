<?php

namespace App\Http\Controllers;

use App\Models\citaVacuna;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\vacuna;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\especie;

class CitaVacunaController extends Controller
{
    //TODO CLASE CONTRUC QUE SE NECESITA PARA QUE FUNCIONEN LOS ROLES EN LAS VISTAS

    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-CitaVacuna|crear-CitaVacuna',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-CitaVacuna', ['only' => ['mostrar', 'store']]);
        /*    $this->middleware('permission:editar-CitaVacuna', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-CitaVacuna', ['only' => ['destroy']]); */
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view(('citasvacunas.index'), compact('mascotas'));
    }


    public function create()
    {

        //return view('citasvacunas.create', compact('vacunas') );
    }


    //**hace la funcion del cargar el formulario para crear cita de vacunacion

    public function mostrar($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $especie = $mascotas->especie;
        //Recuperar las asociaciones de especie_vacuna segun la especie de la mascota.
        $vacunas=[];
        foreach($especie->vacuna as $asociacion){
            $vacuna_asociada = vacuna::find($asociacion->id);
            if($vacuna_asociada->disponibilidadVacuna == TRUE){
                $vacunas[]=$vacuna_asociada;
            }
        }
        // $vacuna_asociada = vacuna::find();
        // //Recuperamos las vacunas habilitadas
        // $vacunas = vacuna::where('disponibilidadVacuna', '1')->get();
        // // $vacunas = vacuna::where('disponibilidadVacuna', '1')->get();
        return view('citasvacunas.create', compact('mascotas', 'vacunas','especie'));
        //return view('Cirugia.CrearCirugia');
    }

    public function validar($id)
    {
        // $mascotas = mascota::FindOrFail($id);

        $idmascotas = DB::table('mascotas')->select('id')->get();


        return view('citasvacunas.store', compact('mascotas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*       $datosCita = request()->except('_token','idVisible','end','inputnombreDuenio','inputContactNumber','inputDireccion');

      citaVacuna ::insert($datosCita);
      //return response()->json($datosCita);
      //echo '<script language="javascript">alert("juas");</script>';
      return redirect('/'); */

        //Recordatorio
        if (request('dias_de_anticipacion') != 0) {

            $nombreVacuna = vacuna::where('id', request('vacuna_id'))->get('nombreVacuna');

            $variable = null;

            foreach ($nombreVacuna as $nomVac) {
                $variable = $nomVac->nombreVacuna;
            }

            $datosRecordatorio =
                [
                    'id' => recordatorio::max('id') + 1,
                    'estado' => 0, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
                    'dias_de_anticipacion' => request('dias_de_anticipacion'),
                    'fecha' => request('start'),
                    'concepto' => 'la vacuna de ' . $variable,
                    'nombre' => request('nombre_mascota'),
                    'id_mascota' => request('idVisible'),
                    'telefono' => request('inputContactNumber'),
                    'id_propietario' => request('id_propietario')
                ];

            $datosVacuna = [
                'recordatorio_id' => recordatorio::max('id') + 1,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'groupId' => request('groupId'),
                //'end' => request('end'),
                //capturo la fecha de aplicacionde la vacuna
                'fechaAplicacion' => request('end'),
                'groupId' => request('groupId'),
                'filtervacunas' => request('filtervacunas'),
                'title' => request('title'),
                'estadoCita' => request('estadoCita'),
                /*  'pesolb' => request('pesolb'), */
                'vacuna_id' => request('vacuna_id')
            ];

            recordatorio::insert($datosRecordatorio);
            citaVacuna::insert($datosVacuna);
        } else if (request('dias_de_anticipacion') == 0) {

            $datosVacuna = [
                'recordatorio_id' => null,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'groupId' => request('groupId'),
                //'end' => request('end'),
                'fechaAplicacion' => request('end'),
                'groupId' => request('groupId'),
                'filtervacunas' => request('filtervacunas'),
                'title' => request('title'),
                'estadoCita' => request('estadoCita'),
                /*   'pesolb' => request('pesolb'), */
                'vacuna_id' => request('vacuna_id')
            ];

            citaVacuna::insert($datosVacuna);
        }
        //Finaliza recordatorio
        //return redirect('/?objeto=cita&accion=creo');
        return redirect('/')->with('success', 'La cita de vacunación ha sido creada correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function showCalendar(citaVacuna $citaVacuna)
    {
        // return view('citasVacunas.gestionarCitasVacunacion');
        $citaVacuna = citaVacuna::all();
        return response()->json($citaVacuna);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaVacuna = citaVacuna::find($id);
        $citaVacuna->start = Carbon::createFromFormat('Y-m-d H:i:s', $citaVacuna->start)->format('d-m-Y');
        return response()->json($citaVacuna);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citaVacuna $citaVacuna)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaVacuna  $citaVacuna
     * @return \Illuminate\Http\Response
     */
    public function destroy(citaVacuna $citaVacuna)
    {
        //
    }

    //Función para consultar citas de una vacuna especifica, utilizada para verificar si se puede eliminar
    //una vacuna especifica
    public function consultarCitasVacunaPorIdVacuna($id)
    {
        $citasVacuna = citaVacuna::where('vacuna_id', $id)->get();
        return response()->json($citasVacuna);
    }

    //Funcion para obetner los dias por vacuna
    public function obtenerDias($id)
    {

        $diasVacuna = vacuna::find($id);
        return response()->json($diasVacuna);
    }
}
