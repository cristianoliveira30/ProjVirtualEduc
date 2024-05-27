<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'matematica',
        'portugues',
        'ingles',
        'espanhol',
        'historia',
        'geografia',
        'ciencias',
        'fisica',
        'quimica',
        'biologia',
        'artes',
        'educacaofisica',
        'informatica',
        'leiturainterpretacao',
        'outras'
    ];
    
    public function user() {
        return $this->belongsTo(Clientes::class);
    }

    public function disciplina() {
        return $this->belongsTo(Escolaridade::class);
    }

    public function tasks() {
        return $this->hasMany(Arquivos::class);
    }
}
