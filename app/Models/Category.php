<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['nama_kategori'];

    public function ikan(): HasMany
{
    return $this->hasMany(Ikan::class, 'kategori_id', 'id');
}

}
