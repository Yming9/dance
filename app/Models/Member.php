<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    public $signText = [
        1 => '个人',
        2 => '团体'
    ];

    public $signCss = [
        1 => 'label-success',
        2 => 'label-primary',
    ];

    public function register()
    {
        return $this->hasMany(Register::class);
    }

}
