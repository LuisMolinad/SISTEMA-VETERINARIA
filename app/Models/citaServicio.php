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
        'end' => 'required',
        'groupId' => 'required',
        'filterservicios' => 'required',
        'tipoServicio_id' => 'required',
        'color' => 'required',
    ];


    protected $fillable = ['title','horaServicio', 'start','clienteServicio',
    'telefonoServicio', 'descripcion','end','groupId','filterservicios','tipoServicio_id', 'color'];

}
