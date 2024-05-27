<?php

use App\Models\Clientes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('clientes')->onDelete('cascade');
            $table->string('cpf');
            $table->boolean('manyaccounts')->default(false);
            $table->boolean('manydisciplines')->default(false);
            $table->boolean('muchspace')->default(false);
            $table->boolean('muchfiles')->default(false);
            $table->boolean('changelayout')->default(false);
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
        Schema::table('escolaridade'. function(Blueprint $table) {
            $table->dropForeignIdFor(Clientes::class);
        });
        Schema::dropIfExists('permissoes');
    }
}
