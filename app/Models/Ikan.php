<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ikan extends Model
{
    use HasFactory;

    protected $table = 'ikans';

    // Tambahkan 'jumlah' dan 'harga_total' ke fillable
    protected $fillable = [
    'nama',
    'kategori_id',
    'harga_per_kg',
    'jumlah',
    'user_id', // ← ini harus ada
];



    // Relasi ke kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    // Relasi ke detail rekap
    public function rekapDetails(): HasMany
    {
        return $this->hasMany(RekapDetail::class);
    }
  public function user()
{
    return $this->belongsTo(User::class);
}

}
