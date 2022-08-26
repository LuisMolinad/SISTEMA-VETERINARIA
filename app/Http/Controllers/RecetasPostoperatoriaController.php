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
    public function mostrar($id)
    {
        $receta = RecetasPostoperatoria::where('id',$id)->get();
        $cita = citaCirugia::FindOrFail($receta);
        $mascota = mascota::where('id', $cita->mascota_id)->with('propietario')->get();

        $propietario = propietario::where('id', $mascota[0]->propietario_id)->get();

        $datos = [
            'mascotas' => $mascota,
            'citaCirugias' => citaCirugia::where('id',$id)->get(),
            'propietarios' => $propietario,
            'receta' => RecetasPostoperatoria::where('id',$id)->get()
        ];
        
       return view('RecetaPost.create', compact('datos','cita'));


        // $mascotas=mascota::with('propietario')->findOrFail($id);
     
        // return view('RecetaPostoperatoria.create',compact('mascotas'));

    }
    public function pdf($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $pdf = PDF::loadView('RecetaPostoperatoria.pdf' ,['mascotas'=>$mascotas]);
        return $pdf->stream();

     }

}


