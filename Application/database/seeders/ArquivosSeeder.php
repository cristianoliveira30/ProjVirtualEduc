<?php

namespace Database\Seeders;

use App\Models\Arquivos;
use Illuminate\Database\Seeder;

class ArquivosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Arquivos::create([
            'clientes_id' => 1,
            'disciplina' => 'outras',
            'pdf' => 2,
            'jpg' => 2,
            'jpeg' => 2,
            'png' => 2,
            'svg' => 2,
            'gif' => 2,
            'mp3' => 2,
            'mp4' => 2,
            'mpg' => 2,
            'mpeg' => 2,
            'msi' => 2,
            'avi' => 2,
            'doc' => 2,
            'docm' => 2,
            'docx' => 2,
            'csv' => 2,
            'ex' => 2,
            'exl' => 2,
            'dot' => 2,
            'dotx' => 2,
            'pot' => 2,
            'potx' => 2,
            'pps' => 2,
            'ppsm' => 2,
            'ppsx' => 2,
            'ppt' => 2,
            'pptm' => 2,
            'pptx' => 2,
            'txt' => 2,
            'xlm' => 2,
            'xls' => 2,
            'xslm' => 2,
            'xlsx' => 2,
            'xlt' => 2,
            'xltm' => 2,
            'xltx' => 2,
            'ai' => 2,
            'psd' => 2,
            'html' => 2,
            'xml' => 2,
            'xps' => 2,
            'css' => 2,
            'sass' => 2,
            'scss' => 2,
            'js' => 2,
            'm4a' => 2,
            'php' => 2,
            'rar' => 2,
            'zip' => 2,
            'outros' => 2
        ]);
    }
}
