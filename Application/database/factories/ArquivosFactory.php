<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArquivosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $disciplinas = [
            'matematica',
            'portugues',
            'ingles',
            'espanhol',
            'historia',
            'geografia',
            'ciencias',
            'fisica',
            'quimica',
            'biologia',
            'artes',
            'educacaofisica',
            'informatica',
            'leiturainterpretacao',
            'outras'
        ];
        return [
            'user_id' => $this->faker->numberBetween(1, 50),
            'disciplina' => $this->faker->randomElement($disciplinas),
            'pdf' => $this->faker->numberBetween(1, 5),
            'jpg' => $this->faker->numberBetween(1, 5),
            'jpeg' => $this->faker->numberBetween(1, 5),
            'png' => $this->faker->numberBetween(1, 5),
            'svg' => $this->faker->numberBetween(1, 5),
            'gif' => $this->faker->numberBetween(1, 5),
            'mp3' => $this->faker->numberBetween(1, 5),
            'mp4' => $this->faker->numberBetween(1, 5),
            'mpg' => $this->faker->numberBetween(1, 5),
            'mpeg' => $this->faker->numberBetween(1, 5),
            'msi' => $this->faker->numberBetween(1, 5),
            'avi' => $this->faker->numberBetween(1, 5),
            'doc' => $this->faker->numberBetween(1, 5),
            'docm' => $this->faker->numberBetween(1, 5),
            'docx' => $this->faker->numberBetween(1, 5),
            'csv' => $this->faker->numberBetween(1, 5),
            'ex' => $this->faker->numberBetween(1, 5),
            'exl' => $this->faker->numberBetween(1, 5),
            'dot' => $this->faker->numberBetween(1, 5),
            'dotx' => $this->faker->numberBetween(1, 5),
            'pot' => $this->faker->numberBetween(1, 5),
            'potx' => $this->faker->numberBetween(1, 5),
            'pps' => $this->faker->numberBetween(1, 5),
            'ppsm' => $this->faker->numberBetween(1, 5),
            'ppsx' => $this->faker->numberBetween(1, 5),
            'ppt' => $this->faker->numberBetween(1, 5),
            'pptm' => $this->faker->numberBetween(1, 5),
            'pptx' => $this->faker->numberBetween(1, 5),
            'txt' => $this->faker->numberBetween(1, 5),
            'xlm' => $this->faker->numberBetween(1, 5),
            'xls' => $this->faker->numberBetween(1, 5),
            'xslm' => $this->faker->numberBetween(1, 5),
            'xlsx' => $this->faker->numberBetween(1, 5),
            'xlt' => $this->faker->numberBetween(1, 5),
            'xltm' => $this->faker->numberBetween(1, 5),
            'xltx' => $this->faker->numberBetween(1, 5),
            'ai' => $this->faker->numberBetween(1, 5),
            'psd' => $this->faker->numberBetween(1, 5),
            'html' => $this->faker->numberBetween(1, 5),
            'xml' => $this->faker->numberBetween(1, 5),
            'xps' => $this->faker->numberBetween(1, 5),
            'css' => $this->faker->numberBetween(1, 5),
            'sass' => $this->faker->numberBetween(1, 5),
            'scss' => $this->faker->numberBetween(1, 5),
            'js' => $this->faker->numberBetween(1, 5),
            'm4a' => $this->faker->numberBetween(1, 5),
            'php' => $this->faker->numberBetween(1, 5),
            'rar' => $this->faker->numberBetween(1, 5),
            'zip' => $this->faker->numberBetween(1, 5),
            'outros' => 2
        ];
    }
}
