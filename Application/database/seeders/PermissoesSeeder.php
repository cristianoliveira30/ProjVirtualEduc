<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permissoes;

class PermissoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissoes::create([
            'user_id' => 1,
            'cpf' => '05053205231',
            'manyaccounts' => true,
            'manydisciplines' => true,
            'muchspace' => true,
            'muchfiles' => true,
            'changelayout' => true,
        ]);
    }
}
