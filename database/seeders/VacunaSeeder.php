<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class VacunaSeeder extends Seeder
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
                    'nombreVacuna'=> 'Rabia',
                    'descripcionVacuna'=> 'Vacuna contra la rabia obligatoria',
                    'tiempoEntreDosisDia'=> 365

                ],
                [
                    'nombreVacuna'=> 'Parvovirus',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365
                ],
                [
                    'nombreVacuna'=> 'Moquillo-Hepatitis',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365
                ],
            ];

            DB::table('vacunas')->insert($data);
    }
}

