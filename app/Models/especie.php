<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\vacuna;

class especie extends Model
{
    use HasFactory;
    protected $table = 'especies';
    public $timestamps = false;
    protected $fillable =[
        'nombreEspecie',
    ];

    public function vacuna(){
        return $this->belongsToMany(vacuna::class);
    }
}
