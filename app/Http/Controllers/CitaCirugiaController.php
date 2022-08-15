<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Carbon\Carbon;
use PDF;

class CitaCirugiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = mascota::with('propietario')->get();
        // $propietarios = propietario::with('mascotas')->get();
                                                 //aca se van as variables de arriba
         return view(('Cirugia.GestionarCirugia'),compact('mascotas'));
       // $citaCirugia = Cirugia::paginate();

    }

    /*Para el PDF */
    public function pdf($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $pdf = PDF::loadView('Cirugia.pdf' ,['mascotas'=>$mascotas]);
      //  $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return view('Cirugia.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        /*
                $propietario = Propietario::FindOrFail($id);
        return view('propietario.edit', compact('propietario'));
        */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                'concepto' => request('conceptoCirugia'),
                'nombre' => request('title'),
                'id_mascota' => request('idmascota'),
                'telefono' => request('telefono')
            ];

            $datoscirugia = [
                'recordatorio_id' => recordatorio::max('id') + 1,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'conceptoCirugia' => request('conceptoCirugia'),
                'recomendacionPreoOperatoria' => request('recomendacionPreoOperatoria'),
                'end' => request('end'),
                'groupId'=>request('groupId'),
                'filtercirugias' =>request('filtercirugias'),
                'title' => request('title')
            ];

            recordatorio::insert($datosRecordatorio);
            citaCirugia ::insert($datoscirugia);
        }
        else if(request('dias_de_anticipacion') == 0){
            $datoscirugia = [
                'recordatorio_id' => null,
                'start' => request('start'),
                'mascota_id' => request('mascota_id'),
                'conceptoCirugia' => request('conceptoCirugia'),
                'recomendacionPreoOperatoria' => request('recomendacionPreoOperatoria'),
                'end' => request('end'),
                'groupId'=>request('groupId'),
                'filtercirugias' =>request('filtercirugias'),
                'title' => request('title')
            ];

            citaCirugia ::insert($datoscirugia);
        }
        //Finaliza recordatorio

        return redirect('/?objeto=cita&accion=creo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function show(citaCirugia $citaCirugia)
    {
        //Obtengo las cirugias de la base de datos
        $citaCirugia = citaCirugia::all();
        return response()->json($citaCirugia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaCirugia = citaCirugia::find($id);
        $citaCirugia->start=Carbon::createFromFormat('Y-m-d H:i:s', $citaCirugia->start)->format('Y-m-d');
        return response()->json($citaCirugia);
    }

    public function mostrar($id){
        //$mascotas = mascota::FindOrFail($id);
      //  return view('Cirugia.CrearCirugia',compact('mascotas'));
       
    /*  public function show($id)
{
    $item = MenuItem::with('variant')->findOrFail($id);
    return $item;
}*/
        $mascotas=mascota::with('propietario')->findOrFail($id);

        return view('Cirugia.CrearCirugia',compact('mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citaCirugia $citaCirugia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function destroy(citaCirugia $citaCirugia)
    {
        //
    }

    public function gestionar_cirugias_por_mascota(){
        $mascota_id = request('id');
        $datos = citaCirugia::all()->where('mascota_id', $mascota_id);

        return view('Cirugia.gestionar_cirugias.index', compact('datos'));
    }
}
