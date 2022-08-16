<?php

namespace App\Http\Controllers;

use App\Models\citaLimpiezaDental;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\recordatorio;

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
                'nombre' => request('title'),
                'id_mascota' => request('idmascota'),
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

        return redirect('/?objeto=cita&accion=creo');
    }


}
