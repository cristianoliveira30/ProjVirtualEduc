<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaridadeTable extends Migration
{
    public function up()
    {
        Schema::create('escolaridade', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->boolean('fundamental')->default(false);
            $table->boolean('medio')->default(false);
            $table->boolean('superior')->default(false);
            $table->boolean('pos')->default(false);
            $table->boolean('mestrado')->default(false);
            $table->boolean('doutorado')->default(false);
            $table->boolean('cursos')->default(false);
            $table->timestamps(); // Adicionando timestamps para evitar problemas futuros
        });
    }

    public function down()
    {
        Schema::table('escolaridade'. function(Blueprint $table) {
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('escolaridade');
    }
}
