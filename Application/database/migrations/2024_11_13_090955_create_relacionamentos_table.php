<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelacionamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relacionamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_choosen')->constrained('users')->onDelete('cascade');
            $table->boolean('seguindo')->default(false); // estou seguindo?
            $table->boolean('seguido')->default(false); // estou sendo seguido?
            $table->boolean('amizade')->default(false);
            $table->timestamps();

            // Índices
            $table->index('user_id');
            $table->index('user_choosen');
        });

        // Adicionar colunas agregadas para contagem em "users"
        Schema::table('users', function (Blueprint $table) {
            $table->integer('seguidores_count')->default(0);
            $table->integer('seguindo_count')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('relacionamentos');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('seguidores_count');
            $table->dropColumn('seguindo_count');
        });
    }
}
