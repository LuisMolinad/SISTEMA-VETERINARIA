<?php

namespace App\Http\Controllers;
use App\Models\RecetasPostoperatoria;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\citaCirugia;
use Carbon\Carbon;
use PDF;

class RecetasPostoperatoriaController extends Controller
{

    public function create($id){

        $cita_cirugia = citaCirugia::where('id', $id)->first();
        
        $datos = [
            'mascota'=> mascota::where('id', $cita_cirugia->mascota_id )->first(),
            'cita_cirugia'=> $cita_cirugia,
        ];

        return view('RecetaPostoperatoria.create', compact('datos'));
    }

    public function guardar_bd(Request $request){

        $datos = [
            'pesoReceta' => request('pesoReceta'),
            'tratamientoAplicarReceta' => request('tratamientoAplicarReceta'),
        ];


        RecetasPostoperatoria::insert($datos);

        $datos_cirugia = [
            'recetaPost_id'=> RecetasPostoperatoria::max('id')
        ];

        citaCirugia::where('id', request('cita_id'))->update($datos_cirugia);

        //Variables externas a pasar
        $nombre = request('nombre_mascota');
        $fecha = date('d-m-Y', time());

        //return redirect('/')->with('success', 'Receta post operatoria creada con exito');
        $pdf = PDF::loadView('RecetaPostoperatoria.recetaPostoperatoriaPDF', compact('datos', 'nombre', 'fecha'));
        return $pdf->stream();
    }

    public function pdf($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $pdf = PDF::loadView('RecetaPostoperatoria.pdf' ,['mascotas'=>$mascotas]);
        return $pdf->stream();

     }

}


