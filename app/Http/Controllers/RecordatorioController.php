<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use App\Models\citaVacuna;
use App\Models\mascota;
use App\Models\propietario;
use App\Models\recordatorio;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
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
        $recordatorios = recordatorio::all();
        return view('recordatorio.index', compact('recordatorios'));
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
    public function edit($id)
    {
        $maroma = recordatorio::FindOrFail($id);
        $mascota = mascota::where('idMascota', $maroma->id_mascota)->get();

        $informacion = [
            'recordatorio' => recordatorio::FindOrFail($id),
            'mascota' => $mascota
        ];

/*         $informacion = [
            'recordatorio' => recordatorio::FindOrFail($id),
        ]; */

        //$recordatorio = recordatorio::FindOrFail($id);

        return view('recordatorio.edit', compact('informacion'));
        //return view('recordatorio.edit', compact('recordatorio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosRecordatorio = 
        [
            'id' => $id,
            'estado' => 0, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
            'dias_de_anticipacion' => request('dias_de_anticipacion'),
            'fecha' => request('start'),
            'concepto' => request('ConceptoCirugia'),
            'nombre' => request('title'),
            'id_mascota' => request('idmascota'),
            'telefono' => request('telefono')
        ];

        recordatorio::where('id', $id)->update($datosRecordatorio);
        return redirect('/recordatorio?objeto=recordatorio&accion=edito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\recordatorio  $recordatorio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $datosRecordatorio = 
        [
            'dias_de_anticipacion' => null,
        ];

        recordatorio::destroy($id);
/*         citaVacuna::where('recordatorio_id', $id)->update($datosRecordatorio);
        citaCirugia::where('recordatorio_id', $id)->update($datosRecordatorio); */

        try{
            citaVacuna::where('recordatorio_id', $id)->update($datosRecordatorio);
            citaCirugia::where('recordatorio_id', $id)->update($datosRecordatorio);
        }
        catch(Exception $e){
            $e->getMessage();
        }

        return redirect('/recordatorio?objeto=recordatorio&accion=elimino');
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
            return redirect('/recordatorio?mj=Mensaje%20enviado%20correctamente');
        }
        else{
            return redirect('/recordatorio?mj=Mensaje%20no%20enviado');
        }
        
        curl_close($ch);
    }

    public function enviar_mensaje_ui(){
        return view('recordatorio.enviar_mensaje_ui');
    }

    public function enviar_mensaje_masivo(Request $request){
        //Variables
        $id = request('id');
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
            $datosRecordatorio = 
            [
                'estado' => 1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
            ];
    
            recordatorio::where('id', $id)->update($datosRecordatorio);
        }
        else{
            $datosRecordatorio = 
            [
                'estado' => -1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
            ];
    
            recordatorio::where('id', $id)->update($datosRecordatorio);
        }
        
        curl_close($ch);
    }
}