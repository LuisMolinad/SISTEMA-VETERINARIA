<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PropietarioSeeder;
use App\Models\mascota;
use Illuminate\Support\Facades\DB;
class MascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $data= [
         [
            'propietario_id'=>'1',
            'idMascota'=> 'G00001',
            'nombreMascota'=>'ZEUS',
            'razaMascota'=>'MALTES',
            'especie'=>'CANINO',
            'colorMascota'=>'CAFE',
            'sexoMascota' =>'M',
            //'fechaNacimiento'=>$this->faker->date('YYYY_mm_dd'),
            'fechaNacimiento'=>'2022-03-25 13:50:55.999',
            'fallecidoMascota'=>0,
       ],


        [
            'propietario_id'=>'1',
            'idMascota'=> 'G00002',
            'nombreMascota'=>'CANELA',
            'razaMascota'=>'MALTES',
            'especie'=>'CANINO',
            'colorMascota'=>'BLANCO',
            'sexoMascota' =>'F',
            //'fechaNacimiento'=>$this->faker->date('YYYY_mm_dd'),
            'fechaNacimiento'=>'2018-12-25 23:50:55.999',
            'fallecidoMascota'=>0,
        ],

        [
            'propietario_id'=>'9',
            'idMascota'=> 'G00015',
            'nombreMascota'=>'MICHI',
            'razaMascota'=>'PERSIAN',
            'especie'=>'FELINO',
            'colorMascota'=>'BLANCO',
            'sexoMascota' =>'F',
            //'fechaNacimiento'=>$this->faker->date('YYYY_mm_dd'),
            'fechaNacimiento'=>'2016-12-25 23:50:55.999',
            'fallecidoMascota'=>0,
        ]
    ];
    DB::table('mascotas')->insert($data);
    }//$this->faker->randomElement(['Can', 'Felino', 'Ave','Reptil','Pez']),
}
