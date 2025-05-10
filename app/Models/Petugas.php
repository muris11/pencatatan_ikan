<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'petugas';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'role', // admin / user
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function rekaps()
    {
        return $this->hasMany(Rekap::class);
    }
}
