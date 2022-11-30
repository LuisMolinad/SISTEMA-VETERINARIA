<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PropietarioSeeder::class,
            TipoServicioSeeder::class,
            VacunaSeeder::class,
            especieSeeder::class,
            mascotaSeeder::class,
            expedienteSeeder::class,
            expedienteSeeder::class,
            RolesAndPermissionSeeder::class,
            SuperAdminSeeder::class,
            especie_vacuna::class
        ]);
    }
}