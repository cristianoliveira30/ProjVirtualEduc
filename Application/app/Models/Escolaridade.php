<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escolaridade extends Model
{
    use HasFactory;
    
    protected $table = 'escolaridade';
    
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'fundamental',
        'medio',
        'superior',
        'pos',
        'mestrado',
        'doutorado',
        'cursos'
    ];

    public function clientes() {
        return $this->belongsTo(Clientes::class, 'clientes_id');
    }

    public function disciplina() {
        return $this->hasMany(Disciplina::class);
    }
}
