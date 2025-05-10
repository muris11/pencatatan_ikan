<?php

namespace Database\Seeders;

use App\Models\Ikan;
use Illuminate\Database\Seeder;

class IkanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $tawarId = \App\Models\Category::where('nama_kategori', 'Ikan Tawar')->first()->id;
    $lautId = \App\Models\Category::where('nama_kategori', 'Ikan Laut')->first()->id;

    Ikan::insert([
        [
            'nama' => 'Lele',
            'kategori_id' => $tawarId,
            'harga_per_kg' => 15000.00,
            'jumlah' => 10
        ],
        [
            'nama' => 'Gurame',
            'kategori_id' => $tawarId,
            'harga_per_kg' => 30000.00,
            'jumlah' => 5
        ],
        [
            'nama' => 'Tuna',
            'kategori_id' => $lautId,
            'harga_per_kg' => 45000.00,
            'jumlah' => 3
        ],
        [
            'nama' => 'Tongkol',
            'kategori_id' => $lautId,
            'harga_per_kg' => 25000.00,
            'jumlah' => 4
        ],
    ]);
}

}