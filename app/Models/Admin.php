<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'otp', 'otp_expires_at'
    ];

    protected $hidden = [
        'otp', 'remember_token',
    ];

    protected $casts = [
        'otp_expires_at' => 'datetime',
    ];
}