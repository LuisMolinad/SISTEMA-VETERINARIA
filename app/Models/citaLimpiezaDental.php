<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaLimpiezaDental extends Model
{
    use HasFactory;
    //protected $table = 'citaLimpieza';
    public $timestamps = false;

    
    public function mascota()
    {
        return $this->belongsTo(mascota::class);
    }

}
