<?php

namespace App\Models;

use App\Models\User;
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

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function disciplina() {
        return $this->hasMany(Disciplina::class);
    }
}
