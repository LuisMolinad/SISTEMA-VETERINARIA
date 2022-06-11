<?php

namespace App\Http\Controllers;

use App\Models\expediente;
use App\Models\mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;
//use Barryvdh\DomPDF\Facade as PDF;

class ExpedienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $datosExpediente['expedientes'] =expediente::all();
        return view('expediente.index',$datosExpediente);
        */
        $expedientes = expediente::with('mascota')->get();
        return view(('expediente.index'), compact('expedientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expediente.create');
    }

    public function crear($id)
    {
        $mascota = mascota::FindOrFail($id);
        return view('expediente.create', compact('mascota'));
        //return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosExpediente = request()->except('_token');
        Expediente::insert($datosExpediente);
        return redirect('/expediente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function show(expediente $expediente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expediente = Expediente::FindOrFail($id);
        return view('expediente.edit', compact('expediente'));
    }

/*
    public function pdf()
    {
        $pdf = PDF::loadView('Cirugia.pdf');
      //  $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
        //return view('Cirugia.pdf');
    }
    */

    public function pdfConverter($id){
        $expediente = expediente::FindOrFail($id);
        $pdf = PDF::loadView('expediente.pdf', ['expediente'=>$expediente]);
        return $pdf->stream();
    }

    public function pdf($id){
        $expedientes = expediente::with('mascota')->get();
        $expediente = null;
        foreach ($expedientes as $e){
            if($e->id == $id){
                $expediente = $e;
            }
        }
        
        return view(('expediente.pdf'), compact('expediente'));
    }
        //$pdf = PDF::loadView('expediente.pdf',['expediente'=>$expediente]);
        //return $pdf->stream();

        /*
        $pdf = PDF::loadView('expediente.pdf',['expediente'=>$expediente]);
        return $pdf->stream();
        */
        //return view('welcome');

/*
        $pdf = PDF::loadView('expediente.pdf');
        return $pdf->download('archivo.pdf');
        */
        //return $pdf->download('Rosalio.pdf');

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosExpediente = request()->except(['_token', '_method']);
        Expediente::where('id','=',$id)->update($datosExpediente);
        $expediente = Expediente::FindOrFail($id);
        return redirect('/expediente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expediente  $expediente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expediente::destroy($id);
        return redirect('/expediente');
    }
}
