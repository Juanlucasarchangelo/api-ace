<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function enderecos(){
        return $this->belongsTo(Endereco::class, 'enderecos_id');
    }

    protected $guarded = [];
}
