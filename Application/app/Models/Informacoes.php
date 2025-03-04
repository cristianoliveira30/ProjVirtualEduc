<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informacoes extends Model
{
    use HasFactory;
    
    protected $table = 'informacoes';
    
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'segemail',
        'documento',
        'foto'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
