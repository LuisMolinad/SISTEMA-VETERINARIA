<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class record_vacunacion extends Model
{
    use HasFactory;

    public function expediente(){
        return $this->belongsTo(expediente::class);
    }
    
    public function vacuna(){
        return $this->belongsTo(vacuna::class);
    }
}
