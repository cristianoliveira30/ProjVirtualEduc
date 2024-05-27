<?php

namespace App\Models;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissoes extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'cpf',
        'manyaccounts',
        'manydisciplines',
        'muchspace',
        'muchfiles',
        'changelayout',
    ];
    
    public function user() {
        return $this->belongsTo(Clientes::class);
    }
}
