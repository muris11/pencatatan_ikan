<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    Category::insert([
        ['nama_kategori' => 'Ikan Tawar'],
        ['nama_kategori' => 'Ikan Laut'],
    ]);
}
}
