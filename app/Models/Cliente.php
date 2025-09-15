<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'email',
        'cpf_cnpj',
        'telefone',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id', 'id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }
}
