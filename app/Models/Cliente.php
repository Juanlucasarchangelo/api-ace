<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $guarded = [''];

    public function site()
    {
        return $this->hasMany(Site::class, 'cliente_id', 'id');
    }
}
