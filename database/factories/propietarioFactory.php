<?php

namespace Database\Factories;
use App\Models\propietario;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropietarioFactory extends Factory
{
    protected $propietario = propietario::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombrePropietario'=>$this->faker->name(),
            'telefonoPropietario'=>$this-> faker->numerify('7#######'),
            'direccionPropietario'=>$this->faker->text(30),
        ];
    }
}
