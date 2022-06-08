<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitaVacunaSeeder extends Seeder
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
                'mascota_id'=> 1,
                'vacuna_id'=> 1,
                'fechaAplicacion'=> '2021-09-25 13:50:55.999',
                'fechaRefuerzo'=> '2023-03-25 13:50:55.999',

                'estadoCita'=> '0',


            ],
            [
                'mascota_id'=> 2,
                'vacuna_id'=>2,
                'fechaAplicacion'=> '2022-03-25 13:50:55.999',
                'fechaRefuerzo'=> '2023-03-25 13:50:55.999',
                'vacuna_id'=>2,

                'estadoCita'=> 0,
            ],
            [
                'mascota_id'=> 3,
                'vacuna_id'=> 3,
                'fechaAplicacion'=> '2020-09-25 13:50:55.999',
                'fechaRefuerzo'=> '2021-09-25 13:50:55.999',
                'vacuna_id'=> 3,
                'estadoCita'=> 1,
            ],
        ];

        DB::table('cita_vacunas')->insert($data);
    }
}
