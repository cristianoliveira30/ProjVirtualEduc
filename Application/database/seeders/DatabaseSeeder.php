<?php

namespace Database\Seeders;

use App\Models\Arquivos;
use App\Models\Clientes;
use App\Models\Disciplina;
use App\Models\Escolaridade;
use App\Models\Permissoes;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Clientes::factory(50)->create();
        Arquivos::factory(50)->create();
        Disciplina::factory(50)->create();
        Escolaridade::factory(50)->create();
        Permissoes::factory(50)->create();
        // \App\Models\User::factory(10)->create();
        
    }
}