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
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Parvovirus',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Moquillo-Hepatitis',
                    'descripcionVacuna'=> 'Vacuna de caracter obligatorio anual',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna' => 1
                ],
                [
                    'nombreVacuna'=> 'Inmunodeficiencia viral felina (VIF)',
                    'descripcionVacuna'=> 'Vacuna contra la inmunodeficiencia viral felina. Actualmente, la vacuna ha dejeado de ser usada a nivel mundial, debido se detectan anticuerpos en animales que han recibido esta vacuna',
                    'tiempoEntreDosisDia'=> 365,
                    'disponibilidadVacuna'=>'0',
                ],
            ];

            DB::table('vacunas')->insert($data);
    }
}

