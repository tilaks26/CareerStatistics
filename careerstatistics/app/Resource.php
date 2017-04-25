<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Resource extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="resource";
    protected $fillable = [
        'name', 'link',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
