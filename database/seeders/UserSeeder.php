<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin default
        User::create([
            'name' => 'Admin Sekolah',
            'email' => 'admin@sekolah.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Buat user guru sample
        User::create([
            'name' => 'Guru Sample',
            'email' => 'guru@sekolah.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        // Buat user orangtua sample
        User::create([
            'name' => 'Orang Tua Sample',
            'email' => 'orangtua@sekolah.com',
            'password' => Hash::make('password'),
            'role' => 'orangtua',
        ]);
    }
}
