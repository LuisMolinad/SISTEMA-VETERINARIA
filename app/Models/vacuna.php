<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\citaVacuna;

class vacuna extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'vacunas';
    public $timestamps = false;
    protected $fillable = [
        'nombreVacuna',
        'descripcionVacuna',
        'tiempoEntreDosisDia',
    ];

    public function mascota()
    {
        return $this->belongsToMany(mascota::class, 'citaVacunas');
    }
}
