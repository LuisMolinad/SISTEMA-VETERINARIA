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

    protected $table = 'mascotas';
    public $timestamps = false;
    protected $fillable = [

        'propietario_id',
        'idMascota',
        'nombreMascota',
        'razaMascota',
        'especie',
        'colMascota',
        'sexoMascota',
        //'fechaNacimiento'=>$this->faker->date('YYYY_mm_dd'),
        'fechaNacimiento',
        'fallecidoMascota',
    ];


    //ha este metodo me refiero, una mascota tiene muchos propietarios
    public function propietario()
    {
        return $this->belongsTo(propietario::class);
    }


    //relacion con citavacuna, reclama los campos extra como suyos

    public function citas()
    {
        return $this->belongsToMany(vacuna::class, 'citaVacunas')->withPivot('pesolb', 'end', 'start');
    }
}
