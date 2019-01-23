<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public function getConfig()
    {
        return $this->first();
    }
}
