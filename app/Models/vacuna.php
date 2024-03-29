<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\citaVacuna;
use App\Models\especie;


class vacuna extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'vacunas';
    public $timestamps = false;
    protected $fillable = [
        'nombreVacuna',
        'descripcionVacuna',
        'tiempoEntreDosisDia',
        'disponibilidadVacuna',
    ];
    //Define la relacion muchos a muchos, identifica que su id estara  dentro de la tabla citasVacunas como fk
    public function mascota()
    {
        return $this->belongsToMany(mascota::class, 'citaVacunas');
    }

    public function especie()
    {
        return $this->belongsToMany(especie::class, 'especie_vacuna');
    }
    
    public function record_vacunacion()
    {
        return $this->hasMany(record_vacunacion::class);
    }
}
