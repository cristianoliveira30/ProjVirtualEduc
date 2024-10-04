<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDisciplinaTable extends Migration
{
    private $disciplinas = [
        'Bioengenharia',
        'Bioquimica',
        'Biotecnologia',
        'Politica',
        'Relacoes-Internacionais',
        'Biomedicina',
        'Comunicacao',
        'Cultura',
        'Desporto',
        'Cinema',
        'Computacao',
        'Realidade-Virtual',
        'Design-Moda',
        'Design-Industrial',
        'Design-Multimedia',
        'Economia',
        'Engenharia-Aeronautica',
        'Engenharia-Civil',
        'Gestao-Industrial',
        'Eletromecanica',
        'Eletrotecnica-Computadores',
        'Engenharia',
        'Engenharia-Mecanica-Computacional',
        'Gestao',
        'Inteligencia-Artificial',
        'Ciencia-Dados',
        'Marketing',
        'Psicologia',
        'Quimica-Industrial',
        'Quimica-Medicinal',
        'Sociologia',
        'Moda-Sustentavel'
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplinas', function(Blueprint $table) {
            foreach ($this->disciplinas as $disciplina) {
                $table->boolean($disciplina)
                ->default(false)
                ->after('Interpretacao');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplinas', function(Blueprint $table) {
            $table->dropColumn($this->disciplinas);
        });
    }
}
