<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class RecordatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('recordatorio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function show(recordatorio $recordatorio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function edit(recordatorio $recordatorio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, recordatorio $recordatorio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function destroy(recordatorio $recordatorio)
    {
        //
    }

    public function enviar_mensaje(Request $request){
        
        //Variables
        $url = env('FB_URL');
        $cuerpo = [
        "messaging_product" => "whatsapp",
        "to" => "503".request('telefono'),
        "type" => "template",
            "template" => [
            "name" => "info2",
                "language" => [
                    "code" => "es_MX",
                ],
                "components"=>[
                    [
                    "type" => "body",
                        "parameters"=>[
                            [
                                "type" => "text",
                                "text" => request('concepto'),
                            ],
                            [
                                "type" => "text",
                                "text" => request('nombre_mascota'),
                            ],
                            [
                                "type" => "text",
                                "text" => request('fecha'),
                            ],
                        ]
                    ]
                ],
            ],
        ];

        $data = json_encode($cuerpo);
        //Comenzar a crear el objeto de la peticion
        $ch = curl_init($url);

        $codigo_autorizacion = env('FB_Authorization_code');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '. $codigo_autorizacion,
                ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //Ejecutamos la peticion
        $resultado = curl_exec($ch);

        #Vemos si el codigo es 200, si lo es todo nice
        $codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($codigoRespuesta === 200){
            return redirect('/?mj=Mensaje%20enviado%20correctamente');
        }
        else{
            return redirect('/?mj=Mensaje%20no%20enviado');
        }
        
        curl_close($ch);
    }

    public function enviar_mensaje_ui(){
        return view('recordatorio.enviar_mensaje_ui');
    }
}