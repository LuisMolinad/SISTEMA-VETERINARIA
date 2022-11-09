<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class especie_vacuna extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= [
            [
                'especie_id'=> 1,
                'vacuna_id'=> 1,
            ],
            [
                'especie_id'=> 2,
                'vacuna_id'=> 1,
            ],
            [
                'especie_id'=> 1,
                'vacuna_id'=> 3,
            ],
            [
                'especie_id'=> 2,
                'vacuna_id'=> 3,
            ],
            [
                'especie_id'=> 1,
                'vacuna_id'=> 2,
            ],
            [
                'especie_id'=> 1,
                'vacuna_id'=> 4,
            ],
            [
                'especie_id'=> 2,
                'vacuna_id'=> 5,
            ],
            [
                'especie_id'=> 2,
                'vacuna_id'=> 6,
            ],
        ];

        DB::table('especie_vacuna')->insert($data);
    }
}
