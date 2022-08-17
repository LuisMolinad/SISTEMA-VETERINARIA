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
            //'telefonoPropietario'=>$this-> faker->regexify('[6-7]{1}[0-9]{7}'),
            'telefonoPropietario'=>$this-> faker->regexify('[5]{1}[0-9]{7}'),
            'direccionPropietario'=>$this->faker->text(30),
        ];
    }
}
