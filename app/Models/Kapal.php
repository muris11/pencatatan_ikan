<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kapal extends Model
{
    use HasFactory;

    protected $table = 'kapal';

    protected $fillable = [
        'user_id',
        'no_kapal',
        'tanggal',
        'nama_kapal',
        'pemilik',
        'kapasitas',
        'total',
    ];

    /**
     * Relasi: Kapal milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Kapal memiliki banyak Rekap
     */
    public function rekaps()
    {
        return $this->hasMany(Rekap::class);
    }
}
