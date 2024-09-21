<?php

namespace App\Models;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomeusu',
        'nomecomp',
        'email',
        'email_verified_at',
        'password',
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
        'password',
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

    public function sendPasswordResetNotification($token): void
    {
        $url = 'http://localhost:8000/reset-password/'.$token;

        $this->notify(new PasswordResetNotification($url));
    }
}
