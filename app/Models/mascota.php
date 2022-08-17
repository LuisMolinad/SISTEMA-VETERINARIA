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


    //Define que el campo propietario-id pertenece a la tabla propietario relaciob uno a muchos
    public function propietario()
    {
        return $this->belongsTo(propietario::class);
    }


    //relacion con citavacuna, reclama los campos extra como suyos ->withPivot('pesolb', 'end', 'start');
    //Define la relacion muchos a muchos, identifica que su id estara  dentro de la tabla citasVacunas como fk
    public function citas()
    {
        return $this->belongsToMany(vacuna::class, 'citaVacunas')->withPivot('id', 'pesolb', 'end', 'start')->withTimestamps();
    }

    //relacion con citas de limpieza dental
    public function citaLimpiezaDental()
    {
        return $this->hasMany(citaLimpiezaDental::class);
    }
}
