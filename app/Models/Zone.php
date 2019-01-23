<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    public function register()
    {
        return $this->hasMany(Register::class);
    }
}
