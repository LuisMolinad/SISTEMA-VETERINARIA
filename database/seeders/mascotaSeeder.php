<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\mascota;

class mascotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        mascota::factory(250)->create();
    }
}
