<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaServicio extends Model
{
    use HasFactory;

    //Se colocaran validaciones
    static $rules = [
        'title' => 'required',
        'horaServicio' => 'required',
        'start' => 'required',
        'clienteServicio' => 'required',
        'telefonoServicio' => 'required',
        'descripcion' => 'required',
        'end' => 'required'
    ];


    protected $fillable = ['title','horaServicio', 'start','clienteServicio',
    'telefonoServicio', 'descripcion','end'];

}
