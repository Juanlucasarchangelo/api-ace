<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id',
        'endereco',
        'cidade',
        'bairro',
        'numero',
        'complemento',
        'cep',
    ];

    public function cliente() {
        return $this->hasMany(Cliente::class);
    }
}
