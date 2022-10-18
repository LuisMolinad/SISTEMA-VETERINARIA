<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expediente extends Model
{
    use HasFactory;

    protected $table='expedientes';
    public $timestamps = false;

    public function mascota(){
        return $this->belongsTo(mascota::class);
    }

    public function HistorialMedico()
    {
        return $this->hasMany(lineaHistorial::class);
    }

    public function record_vacunacion()
    {
        return $this->hasMany(record_vacunacion::class);
    }

    public function Examen(){
        return $this->hasMany('App\Models\Examen');
    }

}
