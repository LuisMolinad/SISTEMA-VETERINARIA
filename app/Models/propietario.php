<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\mascota;

class propietario extends Model
{
    use HasFactory,Notifiable;

    protected $table='propietarios';
    public $timestamps = false;
    protected $fillable = [
        'nombrePropietario',
        'telefonoPropietario',
        'direccionPropietario',
    ];
    public function mascotas()
    {
        return $this->hasMany(mascota::class);
    }

}
