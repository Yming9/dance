<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function register()
    {
        return $this->hasMany(Register::class);
    }
}
