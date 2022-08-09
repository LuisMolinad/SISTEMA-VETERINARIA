<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class expedienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mascota_id'=>$this->faker->numberBetween(1,25),
            'causaFallecimiento'=>$this->faker->text(30),
            //'fallecidoExpediente'=>$this->faker->randomElement(['Vivo','Fallecido'])
        ];
    }
}
