<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public function register()
    {
        return $this->hasMany(Register::class);
    }
}
