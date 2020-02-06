<?php

namespace App\Models;

use Eloquent as Model;

class Peran extends Model
{
    public $table = 'peran';

    public function membertims()
    {
        return $this->hasMany(Membertim::class, 'peran_id', 'id');        
    }
}