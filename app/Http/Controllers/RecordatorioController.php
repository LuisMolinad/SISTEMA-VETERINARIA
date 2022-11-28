<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use App\Models\citaLimpiezaDental;
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

    //TODO CLASE CONTRUC QUE SE NECESITA PARA QUE FUNCIONEN LOS ROLES EN LAS VISTAS
    /*  $citaVacuna = [
    Permission::create(['name' => 'ver-CitaVacuna']),
    Permission::create(['name' => 'editar-CitaVacuna']),
    Permission::create(['name' => 'crear-CitaVacuna']),
    Permission::create(['name' => 'borrar-CitaVacuna']),
    ]; */
    function __construct()
    {
        // Se crea este metodo para definir 
        // que acciones tiene permitido cada ROL
        //TODO Teoricamente con tener unicamente uno de estos permisos podes ver el index 
        $this->middleware(
            'permission:ver-Recordatorio|crear-Recordatorio|borrar-Recordatorio|enviar-Recordatorio|editar-Recordatorio',
            ['only' => ['index', 'show']]
        );
        $this->middleware('permission:crear-Recordatorio', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-Recordatorio', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-Recordatorio', ['only' => ['destroy', 'eliminar_de_un_jalon']]);
        $this->middleware('permission:enviar-Recordatorio', ['only' => ['enviar_mensaje', 'enviar_mensaje_ui', 'reenviar']]);
    }

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
    public function show($id)
    {
        $datos = recordatorio::where('id', $id)->first();

        return view('recordatorio.show', compact('datos'));
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

        return view('recordatorio.edit', compact('informacion'));
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
                //'estado' => 0, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso
                'dias_de_anticipacion' => request('dias_de_anticipacion'),
                'fecha' => request('start'),
                'concepto' => request('ConceptoCirugia'),
                'nombre' => request('title'),
                'id_mascota' => request('idmascota'),
                'telefono' => request('telefono')
            ];

        recordatorio::where('id', $id)->update($datosRecordatorio);
        return redirect('/recordatorio')->with('warning', 'El recordatorio se ha editado correctamente');
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
                'recordatorio_id' => null,
            ];

        recordatorio::destroy($id);

        try {
            citaVacuna::where('recordatorio_id', $id)->update($datosRecordatorio);
            citaCirugia::where('recordatorio_id', $id)->update($datosRecordatorio);
            citaLimpiezaDental::where('recordatorio_id', $id)->update($datosRecordatorio);
        } catch (Exception $e) {
            $e->getMessage();
        }

        return redirect('/recordatorio')->with('danger', 'El recordatorio se ha eliminado correctamente');
    }

    public function enviar_mensaje(Request $request)
    {
        $enviado = enviar_whatsapp(request('telefono'), request('concepto'), request('nombre_mascota'), request('fecha'));
        if ($enviado) {
            return redirect('/recordatorio/enviar_ui')->with('primary', 'Mensaje enviado satisfactoriamente');
        } else if (!$enviado) {
            return redirect('/recordatorio/enviar_ui')->with('dark', 'El mensaje no se pudo enviar');
        }
    }

    public function enviar_mensaje_ui()
    {
        return view('recordatorio.enviar_mensaje_ui');
    }

    public function enviar_mensaje_masivo(Request $request)
    {

        $fecha_actual = date('d-m-Y');
        $recordatorios = recordatorio::all()->where('estado', 0);
        $contador = 0;
        $contador_no_enviados = 0;

        foreach ($recordatorios as $recordatorio) {

            $fecha = date('d-m-Y', strtotime($recordatorio->fecha . ' - ' . $recordatorio->dias_de_anticipacion . ' days'));

            $datos = [
                'fecha' => $fecha,
                'fecha_actual' => $fecha_actual,
                'valor' => ($fecha_actual == $fecha) ? true : false
            ];

            // return response()->json($datos);

            if ($fecha == $fecha_actual) {
                $enviado = enviar_whatsapp($recordatorio->telefono, $recordatorio->concepto, $recordatorio->nombre, $recordatorio->fecha);
                $id = request('id');

                // return response()->json($recordatorio);

                if ($enviado) {
                    $datosRecordatorio =
                        [
                            'estado' => 1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso

                        ];
                    recordatorio::where('id', $recordatorio->id)->update($datosRecordatorio);
                    $contador++;
                } else if ($enviado == false) {
                    $datosRecordatorio =
                        [
                            'estado' => -1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso

                        ];
                    recordatorio::where('id', $recordatorio->id)->update($datosRecordatorio);
                    $contador_no_enviados++;
                }
            }
        }

        if($contador > 0 && $contador_no_enviados > 0){
            return redirect()->route('recordatorio.index')->with('info', 'Los recordatorios han sido enviados, pero algunos no pudieron enviarse');
        }
        else if($contador > 0){
            return redirect()->route('recordatorio.index')->with('success', 'Los recordatorios han sido enviados');
        }
        else if($contador_no_enviados > 0){
            return redirect()->route('recordatorio.index')->with('danger', 'Los recordatorios no han sido enviados');
        }

        return redirect()->route('recordatorio.index')->with('warning', 'El dia de hoy no hay recordatorios para enviar');

    }

    function eliminar_de_un_jalon()
    {
        try {

            $contador = 0;

            //*Eliminar mensajes enviados
            $mensajes_a_eliminar_enviados = recordatorio::all()->where('estado', '=', '1');
            foreach ($mensajes_a_eliminar_enviados as $id) {
                recordatorio::destroy($id->id);

                $contador += 1;
            }

            if ($contador == 0) {
                return redirect('/recordatorio')->with('info', 'No hay recordatorios para borrar');
            }

            return redirect('/recordatorio')->with('info', 'Los recordatorios enviados se han borrado satisfactoriamente');
        } catch (Exception $e) {
            return redirect('/recordatorio')->with('info', 'Los recordatorios no se han borrado');
        }
    }

    public function reenviar($id)
    {
        $recordatorio = recordatorio::where('id', $id)->first();

        $enviado = enviar_whatsapp($recordatorio->telefono, $recordatorio->concepto, $recordatorio->nombre, $recordatorio->fecha);

        if ($enviado) {
            $datosRecordatorio =
                [
                    'estado' => 1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso

                ];
            recordatorio::where('id', $id)->update($datosRecordatorio);
            return redirect('/recordatorio')->with('info', 'El mensaje se reenvio correctamente');
        } else if (!$enviado) {
            $datosRecordatorio =
                [
                    'estado' => -1, //*0 = no enviado, -1 fallo al enviar, 1 envio exitoso

                ];
            recordatorio::where('id', $id)->update($datosRecordatorio);
            return redirect('/recordatorio')->with('info', 'Hubo un error en el reenvio del mensaje, favor revisar datos');
        }
    }
}

function enviar_whatsapp($telefono, $concepto, $nombre_mascota, $fecha)
{
    //Variables
    $id = request('id');
    $url = env('FB_URL');
    $cuerpo = [
        "messaging_product" => "whatsapp",
        "to" => "503" . $telefono,
        "type" => "template",
        "template" => [
            "name" => "informes_veterinaria_pet_paradise",
            "language" => [
                "code" => "es_MX",
            ],
            "components" => [
                [
                    "type" => "body",
                    "parameters" => [
                        [
                            "type" => "text",
                            "text" => $concepto,
                        ],
                        [
                            "type" => "text",
                            "text" => $nombre_mascota,
                        ],
                        [
                            "type" => "text",
                            "text" => $fecha,
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
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $codigo_autorizacion,
        )
    );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    //Ejecutamos la peticion
    $resultado = curl_exec($ch);

    #Vemos si el codigo es 200, si lo es todo nice
    $codigoRespuesta = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $respuesta = false;

    if ($codigoRespuesta === 200) {
        $respuesta = true;
    } else {
        $respuesta = false;
    }

    curl_close($ch);
    return $respuesta;
}