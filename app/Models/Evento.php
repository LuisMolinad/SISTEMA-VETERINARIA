<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    //Se colocaran validaciones
    static $rules = [
        'title' => 'required',
        'razaServicio' => 'required',
        'colorServicio' => 'required',
        'horaServicio' => 'required',
        'start' => 'required',
        'clienteServicio' => 'required',
        'telefonoServicio' => 'required',
        'descripcion' => 'required',
        'end' => 'required'
    ];

    protected $fillable = ['title','razaServicio',
    'colorServicio','horaServicio', 'start','clienteServicio',
    'telefonoServicio', 'descripcion','end'];

}
