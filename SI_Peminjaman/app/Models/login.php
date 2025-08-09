<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nama tabel di database
    protected $table = 'users';

    // Field yang boleh diisi
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // Hidden agar tidak muncul di output
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
