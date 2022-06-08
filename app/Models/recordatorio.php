<?php

namespace App\Models;
use App\Models\citaVacuna;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recordatorio extends Model
{
    use HasFactory;
    protected $table='recordatorios';
    public $timestamps = false;


}
