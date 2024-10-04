<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomeusu')->unique();
            $table->string('nomecomp');
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('telefone');
            $table->string('escolaridade');
            $table->string('cpf')->unique();
            $table->date('nascimento');
            $table->string('rg');
            $table->string('cep');
            $table->string('estado');
            $table->string('endereco');
            $table->text('content')->nullable();
            $table->boolean('premium')->default(false);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP TABLE if exists users cascade');
    }

}
