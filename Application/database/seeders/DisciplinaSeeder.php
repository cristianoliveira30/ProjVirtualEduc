<?php

namespace Database\Seeders;

use App\Models\Disciplina;
use Illuminate\Database\Seeder;

class DisciplinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Disciplina::create([
            'clientes_id' => 1,
            'matematica' => true,
            'portugues' => true,
            'ingles' => true,
            'espanhol' => true,
            'historia' => true,
            'geografia' => true,
            'ciencias' => true,
            'fisica' => true,
            'quimica' => true,
            'biologia' => true,
            'artes' => true,
            'educacaofisica' => true,
            'informatica' => true,
            'leiturainterpretacao' => true,
            'outras' => 5
        ]);
    }
}
