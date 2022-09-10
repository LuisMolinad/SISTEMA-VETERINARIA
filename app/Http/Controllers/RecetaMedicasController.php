<?php

namespace App\Http\Controllers;
use App\Models\Receta_medica;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\citaCirugia;
use Carbon\Carbon;
use PDF;

class RecetaMedicasController extends Controller
{
    public function create($id){

        $mascotas = mascota::FindOrFail($id);
        //$vacunas = vacuna::all();
        return view('RecetaMedica.create', compact('mascotas'));
        //return view('Cirugia.CrearCirugia');
    }

    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view(('recetaMedica.index'), compact('mascotas'));
        // return view('Actas.index');
    }

    public function guardar_bd(Request $request){

      
        $datos = [
            'pesoRecetaMedica' => request('pesoRecetaMedica'),
            'tratamientoAplicarRecetaMedica' => request('tratamientoAplicarRecetaMedica'),
        ];


        Receta_medica::insert($datos);




        //Variables externas a pasar
        $nombre = request('nombre_mascota');
        $fecha = date('d-m-Y', time());

        //return redirect('/')->with('success', 'Receta post operatoria creada con exito');
        $pdf = PDF::loadView('RecetaMedica.recetaMedicaPDF', compact('datos', 'nombre', 'fecha'));
        return $pdf->stream();
    }

  

}


