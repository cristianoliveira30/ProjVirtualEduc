<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arquivos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'disciplina','pdf','jpg','jpeg','png','svg','gif','mp3','mp4','mpg','mpeg','msi','avi','doc','docm','docx','csv',
        'ex','exl','dot','dotx','pot','potx','pps','ppsm','ppsx','ppt','pptm','pptx','txt','xlm','xls','xslm','xlsx',
        'xlt','xltm','xltx','ai','psd','html','xml','xps','css','sass','scss','js','m4a','php','rar','zip','outros'
    ];
    
    public function user() {
        return $this->belongsTo(Clientes::class);
    }

    public function escolaridade() {
        return $this->belongsTo(Disciplina::class);
    }
}
