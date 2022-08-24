<?php

namespace App\Http\Controllers;

use App\Models\citaLimpiezaDental;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Carbon\Carbon;

class CitaLimpiezaDentalController extends Controller
{
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
                'telefono' => request('telefono')
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
        return redirect('/')->with('success', 'Cita creada correctamente');
    }

    public function showCalendar(citaLimpiezaDental $citaLimpieza)
    {
        //Consultamos los datos almacenados en la base de datos
        $citaLimpieza = citaLimpiezaDental::all();
        return response()->json($citaLimpieza);
    }

    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaLimpieza = citaLimpiezaDental::find($id);

        //Dar formato a los campos recuperados de la base por medio de carbon
        $citaLimpieza ->start = Carbon::createFromFormat('Y-m-d H:i:s', $citaLimpieza->start)->format('Y-m-d');
        //$citaServicio->end = Carbon::createFromFormat('Y-m-d H:i:s', $citaServicio->end)->format('Y-m-d');

        return response()->json($citaLimpieza);
    }


    public function gestionar_limpiezas_por_mascota($id){
        $mascotas = mascota::find($id);
        //return ($mascotas);
        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.index', compact('mascotas'));
    }
    
    //Consultar citas dentales
    public function show($id, $citaLimpieza_id){
       
        $mascotas = mascota::find($id);
        $idcitaLimpiezaDental = citaLimpiezaDental::find($citaLimpieza_id);
        $recordatorio = recordatorio::where('id', $idcitaLimpiezaDental->recordatorio_id)->first();


        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.show',compact('mascotas', 'idcitaLimpiezaDental', 'recordatorio'));

    }


    /*public function showRecordatorios($id){

        //Obtenemos la citas de LimpiezaDental
        $citaLimpieza = citaLimpiezaDental::FindOrFail($id);
        

        $datos=[
            'citaLimpieza' => citaLimpiezaDental::where('id',$id)->get(),
            'recordatorios' => $recordatorio
        ];

        return view('citasLimpiezaDental.gestionarCitasLimpiezaDental.show',compact('datos'));

    }*/

    /*
    public function editRecordatorioLimpieza($id){
        //Recupero todos los recordatorios de la base de datos
        $recordatorio = recordatorio::find($id);
        return response()->json($recordatorio);
    }
    */

}
