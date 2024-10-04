<?php

namespace Database\Seeders;

use App\Models\Informacoes;
use Illuminate\Database\Seeder;

class InformacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informacoes::create([
            'clientes_id' => 1,
            'segemail' => 'taltaltal@gmail',
            'documento' => 'path',
            'foto' => 'pathto',
        ]);
    }
}
