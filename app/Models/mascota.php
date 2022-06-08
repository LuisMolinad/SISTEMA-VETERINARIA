<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\propietario;
use App\Models\citaVacuna;

class mascota extends Model
{
    use HasFactory, Notifiable;

    protected $table='mascotas';
    public $timestamps = false;
    public function propietario()
    {
        return $this->belongsTo(propietario::class);
    }


    //relacion con citavacuna

    public function citaVacunas()
    {
        return $this->hasMany(citaVacuna::class);
    }



}
