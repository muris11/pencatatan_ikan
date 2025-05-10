<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekap extends Model
{
    use HasFactory;

    protected $table = 'rekap';

    protected $fillable = [
        'kapal_id',
        'petugas_id',
        'tanggal',
    ];

    public function kapal()
    {
        return $this->belongsTo(Kapal::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function rekapDetails()
    {
        return $this->hasMany(RekapDetail::class);
    }
}
