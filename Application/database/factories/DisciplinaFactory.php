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
            'clientes_id' => $this->faker->numberBetween(1, 50),
            'matematica' => $this->faker->boolean(),
            'portugues' => $this->faker->boolean(),
            'ingles' => $this->faker->boolean(),
            'espanhol' => $this->faker->boolean(),
            'historia' => $this->faker->boolean(),
            'geografia' => $this->faker->boolean(),
            'ciencias' => $this->faker->boolean(),
            'fisica' => $this->faker->boolean(),
            'quimica' => $this->faker->boolean(),
            'biologia' => $this->faker->boolean(),
            'artes' => $this->faker->boolean(),
            'educacaofisica' => $this->faker->boolean(),
            'informatica' => $this->faker->boolean(),
            'leiturainterpretacao' => $this->faker->boolean(),
            'outras' => $this->faker->numberBetween(0, 5)
        ];
    }
}
