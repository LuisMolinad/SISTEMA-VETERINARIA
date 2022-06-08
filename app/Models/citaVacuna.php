<?php

namespace App\Models;
use App\Models\mascota;
use App\Models\vacuna;
use App\Models\recordatorio;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaVacuna extends Model
{
    use HasFactory;
    protected $table='cita_vacunas';
    public $timestamps = false;

    public function mascota()
    {
        return $this->belongsTo(mascota::class);
    }
    public function vacunas()
    {
        return $this->belongsTo(vacuna::class);
    }

}
