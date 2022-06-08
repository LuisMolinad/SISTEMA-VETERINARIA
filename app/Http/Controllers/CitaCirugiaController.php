<?php

namespace App\Http\Controllers;

use App\Models\citaCirugia;
use Illuminate\Http\Request;
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
       // $citaCirugia = Cirugia::paginate();
       return view('Cirugia.GestionarCirugia'); 
    }

    /*Para el PDF */
    public function pdf()
    {
        $pdf = PDF::loadView('Cirugia.pdf');
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
        return view('Cirugia.CrearCirugia');
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
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function show(citaCirugia $citaCirugia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\citaCirugia  $citaCirugia
     * @return \Illuminate\Http\Response
     */
    public function edit(citaCirugia $citaCirugia)
    {
        //
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
}
