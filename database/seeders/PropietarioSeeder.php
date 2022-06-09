<?php

namespace Database\Seeders;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use  App\Models\propietario;
class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      propietario::factory(250)->create();
       /*  DB::table('propietarios')->insert([
            'nombrePropietario' =>Str::random(10),
            'telefonoPropietario' => $this->faker->numerify('####-####'),
            'direccionPropietario' =>$this->faker->text(200),

        ]); */
    }
}
