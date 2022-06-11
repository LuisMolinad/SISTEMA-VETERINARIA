<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\expediente;

class expedienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        expediente::factory(25)->create();
    }
}
