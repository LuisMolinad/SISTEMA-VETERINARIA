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
                    'descripcionVacuna'=> 'Las vacunas en perros contra la rabia hacen que el animal cree una respuesta inmunológica contra el virus. El perro está protegido a los 14 días tras la inyección de la vacuna. SI ha sido administrada correctamente su efectividad es del 100%.',
                    'tiempoEntreDosisDia'=> 365

                ],
                [
                    'nombreVacuna'=> 'Parvovirus',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365
                ],
                [
                    'nombreVacuna'=> 'Moquillo-Hepatitis-Leptospirosis',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365
                ],
            ];

            DB::table('vacunas')->insert($data);
    }
}

