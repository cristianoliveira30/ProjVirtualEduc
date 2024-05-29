<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arquivos', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('cascade');
            $table->string('disciplina');
            $table->integer('pdf');
            $table->integer('jpg');
            $table->integer('jpeg');
            $table->integer('png');
            $table->integer('svg');
            $table->integer('gif');
            $table->integer('mp3');
            $table->integer('mp4');
            $table->integer('mpg');
            $table->integer('mpeg');
            $table->integer('msi');
            $table->integer('avi');
            $table->integer('doc');
            $table->integer('docm');
            $table->integer('docx');
            $table->integer('csv');
            $table->integer('ex');
            $table->integer('exl');
            $table->integer('dot');
            $table->integer('dotx');
            $table->integer('pot');
            $table->integer('potx');
            $table->integer('pps');
            $table->integer('ppsm');
            $table->integer('ppsx');
            $table->integer('ppt');
            $table->integer('pptm');
            $table->integer('pptx');
            $table->integer('txt');
            $table->integer('xlm');
            $table->integer('xls');
            $table->integer('xslm');
            $table->integer('xlsx');
            $table->integer('xlt');
            $table->integer('xltm');
            $table->integer('xltx');
            $table->integer('ai');
            $table->integer('psd');
            $table->integer('html');
            $table->integer('xml');
            $table->integer('xps');
            $table->integer('css');
            $table->integer('sass');
            $table->integer('scss');
            $table->integer('js');
            $table->integer('m4a');
            $table->integer('php');
            $table->integer('rar');
            $table->integer('zip');
            $table->integer('outros');
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
        Schema::table('arquivos'. function(Blueprint $table) {
            $table->dropForeignIdFor(User::class);
        });
        Schema::dropIfExists('arquivos');
    }
}
