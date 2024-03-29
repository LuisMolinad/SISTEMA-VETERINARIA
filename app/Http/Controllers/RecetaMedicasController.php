<?php

namespace App\Http\Controllers;

use App\Models\receta_medica;
use Illuminate\Http\Request;
use App\Models\mascota;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\propietario;
use App\Models\recordatorio;
use App\Models\citaCirugia;
use Carbon\Carbon;
/* use Illuminate\Support\Facades\App;
use PDF; */

class RecetaMedicasController extends Controller
{

    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-RecetaMedica|crear-RecetaMedica',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-RecetaMedica', ['only' => ['create', 'guardar_bd']]); //crear cita de cirugia
    }




    /*Crea la receta medica*/
    public function create($id)
    {

        $mascotas = mascota::FindOrFail($id);
        //$vacunas = vacuna::all();
        return view('RecetaMedica.create', compact('mascotas'));
        //return view('Cirugia.CrearCirugia');
    }

    /*Tabla general donde recopila todas las mascota, junto con los botones crear y gestionar*/
    public function index()
    {

        $mascotas = mascota::with('propietario')->get();

        return view('RecetaMedica.index', compact('mascotas'));
        // return view('Actas.index');
    }

    /*Guarda en la base de datos receta medica*/
    public function guardar_bd(Request $request)
    {


        $datos = [
            'pesoRecetaMedica' => request('pesoRecetaMedica'),
            'tratamientoAplicarRecetaMedica' => request('tratamientoAplicarRecetaMedica'),
        ];


        receta_medica::insert($datos);




        //Variables externas a pasar
        $nombre = request('nombre_mascota');
        $fecha = date('d-m-Y', time());

        //return redirect('/')->with('success', 'Receta post operatoria creada con exito');
        // $pdf = Pdf::loadView('RecetaMedica.recetaMedicaPDF', compact('datos', 'nombre', 'fecha'));
        $pdf = Pdf::loadView('RecetaMedica.recetaMedicaPDF', ['datos' => $datos, 'nombre' => $nombre, 'fecha' => $fecha]);
        return $pdf->stream();
    }
}
