<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lineaHistorial extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'expediente_id',
        'textoLineaHistorial',
        'fechaLineaHistorial',
    ];

    public function expedienteHistorial()
    {
        return $this->belongsTo(expediente::class);
    }

}
