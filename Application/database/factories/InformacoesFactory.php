<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InformacoesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,50),
            'segemail' => $this->faker->safeEmail(),
            'documento' => $this->faker->name(),
            'foto' => $this->faker->name()
        ];
    }
}
