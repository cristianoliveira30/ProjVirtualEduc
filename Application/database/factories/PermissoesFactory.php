<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PermissoesFactory extends Factory
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
            'cpf' => $this->faker->phoneNumber(12),
            'manyaccounts' => $this->faker->boolean(),
            'manydisciplines' => $this->faker->boolean(),
            'muchspace' => $this->faker->boolean(),
            'muchfiles' => $this->faker->boolean(),
            'changelayout' => $this->faker->boolean(),
        ];
    }
}
