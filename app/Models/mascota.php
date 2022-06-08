<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\propietario;
class mascota extends Model
{
    use HasFactory, Notifiable;

    protected $table='mascotas';
    public $timestamps = false;
    public function propietario()
    {
        return $this->belongsTo(propietario::class);
    }



}
