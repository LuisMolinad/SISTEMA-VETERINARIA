<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class mascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idMascota'=>$this->faker->regexify('[A-Z]{1}[0-9]{3}'),
            'propietario_id'=>$this->faker->numberBetween(1,25),
            'nombreMascota'=>$this->faker->text(15),
            'razaMascota'=>$this->faker->text(15),
            'especie'=>$this->faker->randomElement(['Perro','Gato','Otro']),
            'colorMascota'=>$this->faker->text(15),
            'sexoMascota'=>$this->faker->randomElement(['Hembra','Varón']),
            'fechaNacimiento'=>$this->faker->date('d-m-Y'),
            'fallecidoMascota'=>$this->faker->randomElement(['Fallecido','Vivo']),
            'caracteristicasEspeciales'=>$this->faker->text(100)
        ];
    }
}
