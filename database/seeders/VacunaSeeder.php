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
                    'descripcionVacuna'=> 'Vacuna contra la rabia obligatoria.',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Parvovirus',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual.',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Control de parásitos',
                    'descripcionVacuna'=> 'Control de parásitos de las mascotas.',
                    'tiempoEntreDosisDia'=> 91,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Moquillo-Hepatitis-Leptospirosis',
                    'descripcionVacuna'=> 'Vacuna para el moquillo.',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna'=>'1',
                ],
                [
                    'nombreVacuna'=> 'Leucemia felina',
                    'descripcionVacuna'=> 'Vacuna para la leucemia felina.',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna'=>'1',
                ],
                [
                    'nombreVacuna'=> 'Triple felina',
                    'descripcionVacuna'=> 'Vacuna para la triple felina.',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna'=>'1',
                ],
            ];

            DB::table('vacunas')->insert($data);
    }
}

