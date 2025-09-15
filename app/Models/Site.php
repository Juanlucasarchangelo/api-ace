<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [''];

    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'site_id', 'id');
    }
}
