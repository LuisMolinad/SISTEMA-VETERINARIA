<?php

namespace App\Http\Controllers;

use App\Models\citaLimpiezaDental;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CitaLimpiezaDentalController extends Controller
{
    /*
    Permission::create(['name' => 'ver-LimpiezaDental']),
            Permission::create(['name' => 'editar-LimpiezaDental']),
            Permission::create(['name' => 'consultar-LimpiezaDental']),
            Permission::create(['name'=>'gestionar-LimpiezaDental']),
            Permission::create(['name' => 'crear-LimpiezaDental']),
            Permission::create(['name' => 'borrar-LimpiezaDental']),
    */

    //Para los roles y permisos
    function __construct()
    {
        $this->middleware('permission:editar-LimpiezaDental|consultar-LimpiezaDental|crear-LimpiezaDental|borrar-LimpiezaDental',['only' => ['index']]);

        //Permisos por cada funcionalidad
        $this->middleware('permission:crear-LimpiezaDental', ['only' => ['mostrar', 'store']]);
        $this->middleware('permission:consultar-LimpiezaDental', ['only' => ['show']]);
        $this->middleware('permission:gestionar-LimpiezaDental',['only' => ['gestionar_limpiezas_por_mascota']]);
        $this->middleware('permission:editar-LimpiezaDental',['only' => ['editarLimpieza', 'update']]);
        $this->middleware('permission:borrar-LimpiezaDental',['only' => ['destroy']]);
    }

    /*En la funcion index se encuentra todas las mascotas enlistadas*/
    public function index()
    {
        $mascotas = mascota::with('propietario')->get();
        return view(('citasLimpiezaDental.index'),compact('mascotas'));
    }

    public function mostrar($id){
        $mascotas = mascota::FindOrFail($id);
        return view('citasLimpiezaDental.create', compact('mascotas'));
    }

    //Incluyo lo de los recordatorios
    public function store(Request $request)
    {
        //Recordatorio
        if(request('dias_de_anticipacion') != 0){
            $datosRecordatorio = 
            [
                'id' => recordatorio::max('id') + 1,
                'estado' => 0, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
                'dias_de_anticipacion' => request('dias_de_anticipacion'),
                'fecha' => request('start'),
                'concepto' => 'La limpieza dental',
                'nombre' => request('nombre_mascota'),
                'id_mascota' => request('title'),
                'telefono' => request('telefono'),
                'id_propietario'=>request('id_propietario')
            ];

            $datoslimpieza = [
                'recordatorio_id' => recordatorio::max('id') + 1,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'groupId'=>request('groupId'),
                'title' => request('title'),
                'end' => request('end'),
                'filterLimpiezaDental' => request('filterLimpiezaDental')
            ];

            recordatorio::insert($datosRecordatorio);
            citaLimpiezaDental ::insert($datoslimpieza);
        }
        else if(request('dias_de_anticipacion') == 0){
            $datoslimpieza = [
                'recordatorio_id' => null,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'groupId'=>request('groupId'),
                'title' => request('title'),
                'end' => request('end'),
                'filterLimpiezaDental' => request('filterLimpiezaDental')
            ];

            citaLimpiezaDental ::insert($datoslimpieza);
        }
        //Finaliza recordatorio

        //return redirect('/?objeto=cita&accion=creo');
        return redirect('/')->with('success', 'La cita de Limpieza dental ha sido creada correctamente!');
    }

    public function showCalendar(citaLimpiezaDental $citaLimpieza)
    {
        //Consultamos los datos almacenados en la base de datos
        $citaLimpieza = citaLimpiezaDental::all();
        return response()->json($citaLimpieza);
    }

    /*Esta funcion se utiliza para obtener los recordatorios en el calendario*/
    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaLimpieza = citaLimpiezaDental::find($id);

        //Dar formato a los campos recuperados de la base por medio de carbon
        $citaLimpieza ->start = Carbon::createFromFormat('Y-m-d H:i:s', $citaLimpieza->start)->format('d-m-Y');
        //$citaServicio->end = Carbon::createFromFormat('Y-m-d H:i:s', $citaServicio->end)->format('Y-m-d');

        return response()->json($citaLimpieza);
    }

    /*En la funcion gestionar_limpiezas_por_mascota se encuentra el editar,consultar y eliminar por cada mascota*/
    public function gestionar_limpiezas_por_mascota($id){
        $mascotas = mascota::find($id);
        //return ($mascotas);
        //Me dirige al catalogo
        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.index', compact('mascotas'));
    }
    
    /*En la funcion show se encuentra el consultar*/
    //Consultar citas dentales
    public function show($id, $citaLimpieza_id){
       
        $mascotas = mascota::find($id);
        $idcitaLimpiezaDental = citaLimpiezaDental::find($citaLimpieza_id);
        $recordatorio = recordatorio::where('id', $idcitaLimpiezaDental->recordatorio_id)->first();


        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.show',compact('mascotas', 'idcitaLimpiezaDental', 'recordatorio'));

    }

    /*En la funcion destroy se encuentra el eliminar*/
    public function destroy($citalimpieza_id){
    
        $idcitaLimpieza = citaLimpiezaDental::find($citalimpieza_id);

        //Eliminar un recordatorio
        $idRecordatorio = DB::table('cita_limpieza_dentals')->where('id', '=', $citalimpieza_id)->value('recordatorio_id');
        $deleted = DB::table('recordatorios')
            ->where('id', '=', $idRecordatorio)
            ->delete();

        $id = mascota::find($idcitaLimpieza->mascota_id);
        /*$recordatorio = recordatorio::find($idcitaLimpieza->recordatorio_id)->first();*/
        $idcitaLimpieza->delete();

        return redirect()->action([CitaLimpiezaDentalController::class, 'gestionar_limpiezas_por_mascota'], ['id' => $id])->with('danger', 'Cita de Limpieza Dental Eliminada correctamente');
    }

    //Esta funcion se utiliza para editarlalimpieza [Esta es la vista]
    public function editarLimpieza($id,$citaLimpieza_id){
        //Recuperamos la mascota
        $mascotas = mascota::find($id);
        //recuperamos las citas de limpieza dental
        $citaDental = citaLimpiezaDental::find($citaLimpieza_id);
        $dias_anteriores = request('dias_de_anticipacion');

        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.editar', compact('mascotas','citaDental','dias_anteriores')); 

    }

    /*En la funcion update se encuentra el editar*/
    public function update(Request $request, $idCitaLimpieza, $idmascota)
    {

        //Obtenemos los dias de anticipación
        $dias_anteriores = request('dias_de_anticipacion');
        
        $citaLimpieza = citaLimpiezaDental::find($idCitaLimpieza);
        $fechaDelimpieza = $citaLimpieza->start = request('start');

        //Obtengo el recordatorio de la tabla cita limpieza
        $idRecordatorio = $citaLimpieza->recordatorio_id;

        $citaLimpieza->update();

        //Obtengo la base de datos por medio de DB
        $actualizarCita = DB::table('recordatorios')->where('id', '=', $idRecordatorio)
                            ->update(['dias_de_anticipacion'=>$dias_anteriores, 'fecha' =>$fechaDelimpieza]);

        $mascotas = mascota::find($idmascota);

        //return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.index', compact('mascotas'));
        return redirect()->action([CitaLimpiezaDentalController::class, 'gestionar_limpiezas_por_mascota'], ['id' => $mascotas])->with('warning', 'Cita Limpieza Dental actualizada correctamente');
    }

}
