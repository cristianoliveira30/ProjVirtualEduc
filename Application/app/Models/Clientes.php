<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomeusu',
        'nomecomp',
        'email',
        'email_verified_at',
        'senha',
        'telefone',
        'escolaridade',
        'cpf',
        'nascimento',
        'rg',
        'cep',
        'estado',
        'endereco',
        'content',
        'premium'
    ];

    protected $attributes = [
        'premium' => false,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha', // Corrigido para 'senha' em vez de 'password' para corresponder à sua coluna
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'nascimento' => 'date', // Casting para 'date' para a coluna 'nascimento'
        'premium' => 'boolean', // Casting para 'boolean' para a coluna 'premium'
    ];
}