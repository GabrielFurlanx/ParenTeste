<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nome_completo',
        'email',
        'cpf',
        'telefone',
        'endereco',
        'bairro',
        'cep',
        'complemento',
        'genero',
        'data_nascimento',
        'convenio',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];
}
