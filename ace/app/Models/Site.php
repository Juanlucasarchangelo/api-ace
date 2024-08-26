<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $guarded = [];

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'clientes_id');
    }

    public function resumos(){
        return $this->belongsTo(Resumo::class, 'resumos_id');
    }
}
