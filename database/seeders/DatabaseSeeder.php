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
        $this->call([PropietarioSeeder::class]);
        $this->call([TipoServicioSeeder::class]);
        $this->call([VacunaSeeder::class]);
        //$this->call([ MascotasSeeder::class ]);
        $this->call([especieSeeder::class]);
        $this->call([mascotaSeeder::class]);
        $this->call([expedienteSeeder::class]);
        //aca tengo que poner el seeder de los roles y permisos
        $this->call([RolesAndPermissionSeeder::class]);
        $this->call([SuperAdminSeeder::class]);
        $this->call([especie_vacuna::class]);
        //seeder del recordatorio
        //seeder de cita servicio
        //seeder de mascota
        //seeder de expediente
        //seeder de citavacuna
        //seeder de citacirugia
    }
}
