<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'points',
<<<<<<< HEAD
=======
        'registration_date'
>>>>>>> ui-auth
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'registration_date' => 'datetime',
        'points' => 'integer',
    ];
}
