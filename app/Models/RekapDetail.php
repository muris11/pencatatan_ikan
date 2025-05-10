<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RekapDetail extends Model
{
    use HasFactory;

    protected $table = 'rekap_detail';

    protected $fillable = [
        'rekap_id',
        'ikan_id',
        'jumlah',
    ];

    public function rekap()
    {
        return $this->belongsTo(Rekap::class);
    }

    public function ikan()
    {
        return $this->belongsTo(Ikan::class);
    }
}
