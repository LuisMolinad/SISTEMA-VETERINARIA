<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;

class CitaLimpiezaDentalController extends Controller
{
    public function index()
    {
        $mascotas = mascota::with('propietario')->get();
        return view(('citasLimpiezaDental.index'),compact('mascotas'));
    }

    public function mostrar($id){
        $mascotas = mascota::FindOrFail($id);
        return view('citasLimpiezaDental.create', compact('mascotas'));
    }

}
