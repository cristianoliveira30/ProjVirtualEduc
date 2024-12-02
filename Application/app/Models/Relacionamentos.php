<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacionamentos extends Model
{
    use HasFactory;

    protected $table = 'relacionamentos';

    public $imestamp = false;

    protected $fillable = [
        'user_id',
        'user_choosen',
        'seguido',
        'seguindo'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
