<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Job extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table="job";
    protected $fillable = [
        'username', 'email', 'name', 'position', 'city', 'state', 'month', 'year', 'gpa',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
