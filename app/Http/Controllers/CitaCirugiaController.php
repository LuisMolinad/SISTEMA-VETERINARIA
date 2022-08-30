<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Carbon\Carbon;
use Exception;
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
        return view(('Cirugia.GestionarCirugia'),compact('mascotas'));

    }

    /*Para el PDF */
    public function pdf($id)
    {
        $mascotas = mascota::FindOrFail($id);
        $pdf = PDF::loadView('Cirugia.pdf' ,['mascotas'=>$mascotas]);
        return $pdf->stream();
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
                'nombre' => request('nombre_mascota'),
                'id_mascota' => request('title'),
                'telefono' => request('telefono'),
                'id_propietario'=>request('id_propietario')
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

        //return redirect('/?objeto=cita&accion=creo');
        return redirect('/')->with('success', 'Cita de cirugía creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
      $cita = citaCirugia::FindOrFail($id);
        $mascota = mascota::where('id', $cita->mascota_id)->with('propietario')->get();

       $propietario = propietario::where('id', $mascota[0]->propietario_id)->get();
       $recordatorio = recordatorio::where('id', $cita->recordatorio_id)->first();

         $datos = [
             'mascotas' => $mascota,
             'citaCirugias' => citaCirugia::where('id',$id)->get(),
             'propietarios' => $propietario,
             'recordatorios' => $recordatorio
         ];

       return view('Cirugia.gestionar_cirugias.show', compact('datos'));
       
   

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
    public function update(Request $request, $id)
    {

        $datosCitaCirugia = 
        [
            'id' => $id,
            'conceptoCirugia' => request('conceptoCirugia'),
            'start' => request('start'),
            'recomendacionPreoOperatoria' => request('recomendacionPreoOperatoria'),
        ];
        citaCirugia::where('id', $id)->update($datosCitaCirugia);


        $mascota_id=citaCirugia::where('id',$id)->get('mascota_id')->first();
        // $datos =  [
        //     $mascota_id = request('id'),
        //     $datos = citaCirugia::all()->where('mascota_id', $mascota_id),
        //     $mascotas = mascota::find($id),
        // ];
       // return redirect('GestionCirugia.update');
       //Me falta que me mande a la vista

       try{
        $datosRecordatorio=[
            'concepto' => request('conceptoCirugia'),
            'fecha' => request('start'),
            'dias_de_anticipacion'=>request('dias_de_anticipacion')
        ];
    
           $recordatorio_id = citaCirugia::where('id', $id)->first();
    
           recordatorio::where('id', $recordatorio_id->recordatorio_id )->update($datosRecordatorio);
       }
       catch(Exception $exception){
        $exception->getMessage();
       }
       
       return redirect('citacirugia/index/gestionarCirugia/'.$mascota_id->mascota_id)->with('warning', 'Cita de cirugía ha sido editada correctamente');
      

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Recordatorio destroy
        try{
            $recordatorio_id = citaCirugia::where('id',$id)->first();
            recordatorio::destroy($recordatorio_id->recordatorio_id);
        }
        catch(Exception $e){

        }

        $registro = citaCirugia::where('id',$id)->get('mascota_id');

        citaCirugia::destroy($id);

        return redirect('/citacirugia/index/gestionarCirugia/'. $registro[0]->mascota_id)->with('danger', 'Cita de cirugía eliminada correctamente');
    }

    public function gestionar_cirugias_por_mascota($id){
        $mascota_id = request('id');
        $datos = citaCirugia::all()->where('mascota_id', $mascota_id);
        $mascotas = mascota::find($id);
        return view('Cirugia.gestionar_cirugias.index', compact('mascotas','datos'));


    }

    //Se utiliza para mostrar las citas en el calendario
    public function showCalendar(citaCirugia $citaCirugia)
    {
        //Consultamos los datos almacenados en la base de datos
        $citaCirugia = citaCirugia::all();
        return response()->json($citaCirugia);
    }

    //Se utiliza para actualizar cita
     public function editarCirugia($id)
    {
        $cita = citaCirugia::FindOrFail($id);
        $mascota = mascota::where('id', $cita->mascota_id)->with('propietario')->get();
        $propietario = propietario::where('id', $mascota[0]->propietario_id)->get();
        $recordatorio = recordatorio::where('id', $cita->recordatorio_id)->first();

        $datos = [
            'mascotas' => $mascota,
            'citaCirugias' => citaCirugia::where('id',$id)->get(),
            'propietarios' => $propietario,
            'recordatorio' => $recordatorio
        ];
        
       return view('Cirugia.gestionar_cirugias.edit', compact('datos','cita'));

    }
}
