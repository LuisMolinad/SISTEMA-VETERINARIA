<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citaCirugia extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function mascota()
    {
        return $this->belongsTo(mascota::class);
    }
}
