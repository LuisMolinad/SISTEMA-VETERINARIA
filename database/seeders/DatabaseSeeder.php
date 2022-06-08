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
        //seeder del recordatorio
        //seeder de cita servicio
        //seeder de mascota
        //seeder de expediente
        //seeder de citavacuna
        //seeder de citacirugia
    }
}
