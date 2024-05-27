<?php

namespace Database\Seeders;

use App\Models\Escolaridade;
use Illuminate\Database\Seeder;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Escolaridade::create([
            'clientes_id' => 1,
            'fundamental' => true,
            'medio' => true,
            'superior' => true,
            'pos' => false,
            'mestrado' => false,
            'doutorado' => false,
            'cursos' => false
        ]);
    }
}
