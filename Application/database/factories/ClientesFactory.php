<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomeusu' => $this->faker->userName(8),
            'nomecomp' => $this->faker->name(20),
            'email' => $this->faker->unique()->safeEmail(),
            'senha' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'telefone' => $this->faker->phoneNumber(12),
            'escolaridade' => 'superior',
            'cpf' => $this->faker->phoneNumber(11),
            'nascimento' => $this->faker->date(),
            'rg' => '8888888',
            'cep' => '11111111',
            'estado' => 'PA',
            'endereco' => 'Rua dos bobos, número 0',
            'content' => 'adicional',
            'premium' => $this->faker->boolean(),
        ];
    }
}
