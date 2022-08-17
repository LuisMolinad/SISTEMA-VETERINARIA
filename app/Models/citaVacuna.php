<?php

namespace App\Models;

use App\Models\mascota;
use App\Models\vacuna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaVacuna extends Model
{
    /* 
    La tabla que define este modelo cumple la funcion de ser la tabla intermedia entre vacuna y mascota
    */
    use HasFactory;
    protected $table = 'citaVacunas';
    public $timestamps = false;
    protected $fillable = [
        'mascota_id',
        'vacuna_id',
        'end',
        'start',
        'estadoCita',
        'pesolb',
        'created_at',
        'updated_at',
        'title',
        'filtervacunas',


    ];
}
