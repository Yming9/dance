<?php

namespace App\Models;

use App\Http\Controllers\Manage\Management\CoalGassesController;
use App\Http\Controllers\Manage\Management\DeliverWaterController;
use App\Http\Controllers\Manage\Management\PublicToiletsController;
use App\Http\Controllers\Manage\Management\RecoveriesController;
use App\Http\Controllers\Manage\Management\UnlockController;
use App\Http\Controllers\Manage\Service\HouseMoveController;
use App\Http\Controllers\Manage\Service\RentalController;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




}
