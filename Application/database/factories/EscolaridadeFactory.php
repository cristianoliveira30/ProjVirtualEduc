<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EscolaridadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clientes_id' => $this->faker->numberBetween(1,50),
            'fundamental' => $this->faker->boolean(),
            'medio' => $this->faker->boolean(),
            'superior' => $this->faker->boolean(),
            'pos' => $this->faker->boolean(),
            'mestrado' => $this->faker->boolean(),
            'doutorado' => $this->faker->boolean(),
            'cursos' => $this->faker->boolean()
        ];
    }
}
