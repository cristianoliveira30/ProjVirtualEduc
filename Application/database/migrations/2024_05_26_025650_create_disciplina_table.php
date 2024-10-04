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
            $table->boolean('Matematica')->default(false);
            $table->boolean('Portugues')->default(false);
            $table->boolean('Ingles')->default(false);
            $table->boolean('Espanhol')->default(false);
            $table->boolean('Historia')->default(false);
            $table->boolean('Geografia')->default(false);
            $table->boolean('Ciencias')->default(false);
            $table->boolean('Fisica')->default(false);
            $table->boolean('Quimica')->default(false);
            $table->boolean('Biologia')->default(false);
            $table->boolean('Artes')->default(false);
            $table->boolean('Educacao-Fisica')->default(false);
            $table->boolean('Informatica')->default(false);
            $table->boolean('Leitura')->default(false);
            $table->boolean('Interpretacao')->default(false);
            $table->integer('Outras')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('disciplinas');
    }
    
}
