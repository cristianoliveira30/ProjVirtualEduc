<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('cascade');
            $table->boolean('matematica')->default(false);
            $table->boolean('portugues')->default(false);
            $table->boolean('ingles')->default(false);
            $table->boolean('espanhol')->default(false);
            $table->boolean('historia')->default(false);
            $table->boolean('geografia')->default(false);
            $table->boolean('ciencias')->default(false);
            $table->boolean('fisica')->default(false);
            $table->boolean('quimica')->default(false);
            $table->boolean('biologia')->default(false);
            $table->boolean('artes')->default(false);
            $table->boolean('educacaofisica')->default(false);
            $table->boolean('informatica')->default(false);
            $table->boolean('leiturainterpretacao')->default(false);
            $table->integer('outras')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disciplinas'. function(Blueprint $table) {
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('disciplina');
    }
}
