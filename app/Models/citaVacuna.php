<?php

namespace App\Models;
use App\Models\mascota;
use App\Models\vacuna;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaVacuna extends Model
{
    use HasFactory;
    protected $table='cita_vacunas';
    public $timestamps = false;
    protected $fillable =[
        'mascota_id',
        'vacuna_id',
        'fechaAplicacion',
        'fechaRefuerzo',
        'estadoCita',
        'pesolb',
    ];


    public function mascota()
    {
        return $this->belongsTo(mascota::class);
    }
    public function vacunas()
    {
        return $this->belongsTo(vacuna::class);
    }

}
