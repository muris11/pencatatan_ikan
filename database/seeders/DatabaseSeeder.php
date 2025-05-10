<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

public function run(): void
{
    // Tambahkan admin
    User::updateOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'nama' => 'Admin',
            'password' => Hash::make('password'), // ganti dengan password aman
            'role' => 'admin',
        ]
    );
}

}
