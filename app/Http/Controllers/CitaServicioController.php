<?php

namespace App\Http\Controllers;

use App\Models\citaServicio;
use App\Models\tipoServicio;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CitaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* 
    function __construct()
    {


        // Se crea este metodo para definir 
        // que acciones tiene permitido cada middlwere

        $this->middleware(
            'permission:ver-citasServicios|crear-citasServicios|editar-citasServicios|borrar-citasServicios',
            ['only' => ['index']]
        );
        $this->middleware('permission:crear-citasServicios', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-citasServicios', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-citasServicios', ['only' => ['destroy']]);
    } */
    public function index()
    {
        $tipoServicios = tipoServicio::all();
        //Retornamos a la vista del calendario
        return view('Calendario.index', compact("tipoServicios"));
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
        request()->validate(citaServicio::$rules);
        $citaServicio = citaServicio::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\citaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function show(citaServicio $citaServicio)
    {
        //Consultamos los datos almacenados en la base de datos
        $citaServicio = citaServicio::all();
        return response()->json($citaServicio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Obtengo la informacion al darle click a un evento por medio de su id
        $citaServicio = citaServicio::find($id);

        //Dar formato a los campos recuperados de la base por medio de carbon
        $citaServicio->start = Carbon::createFromFormat('Y-m-d H:i:s', $citaServicio->start)->format('Y-m-d');
        $citaServicio->end = Carbon::createFromFormat('Y-m-d H:i:s', $citaServicio->end)->format('Y-m-d');

        return response()->json($citaServicio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\citaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, citaServicio $citaServicio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\citaServicio  $citaServicio
     * @return \Illuminate\Http\Response
     */
    public function destroy(citaServicio $citaServicio)
    {
        //
    }
}
