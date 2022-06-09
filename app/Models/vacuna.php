<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\citaVacuna;
class vacuna extends Model
{
    use HasFactory;
    protected $table='vacunas';
    public $timestamps = false;

    public function citaVacunas()
    {
        return $this->hasMany(citaVacuna::class);
    }

}
