<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DisciplinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'Matematica' => $this->faker->boolean(),
            'Portugues' => $this->faker->boolean(),
            'Ingles' => $this->faker->boolean(),
            'Espanhol' => $this->faker->boolean(),
            'Historia' => $this->faker->boolean(),
            'Geografia' => $this->faker->boolean(),
            'Ciencias' => $this->faker->boolean(),
            'Fisica' => $this->faker->boolean(),
            'Quimica' => $this->faker->boolean(),
            'Biologia' => $this->faker->boolean(),
            'Artes' => $this->faker->boolean(),
            'Educacao-Fisica' => $this->faker->boolean(),
            'Informatica' => $this->faker->boolean(),
            'Leitura' => $this->faker->boolean(),
            'Interpretacao' => $this->faker->boolean(),
            'Outras' => $this->faker->boolean(),
        ];
    }
}
            