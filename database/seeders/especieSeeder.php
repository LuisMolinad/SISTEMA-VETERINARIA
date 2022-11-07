<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class especieSeeder extends Seeder
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
                'nombreEspecie'=> 'Canino',
            ],
            [
                'nombreEspecie'=> 'Felino',
            ],
            [
                'nombreEspecie'=> 'Roedor',
            ],
            [
                'nombreEspecie'=> 'Ave',
            ],
            [
                'nombreEspecie'=> 'Otro',
            ],
        ];

        DB::table('especies')->insert($data);
    }
}
