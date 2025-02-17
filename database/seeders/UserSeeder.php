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
        User::create([
            'nama' => 'Admin',
            'alamat' => 'Pesantren ABC',
            'telepon' => '081234567890',
            'email' => 'admin@pesantren.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'nama' => 'Tamu',
            'alamat' => 'Santri XYZ',
            'telepon' => '082345678901',
            'email' => 'tamu@pesantren.com',
            'password' => Hash::make('password'),
            'role' => 'tamu',
        ]);
    }
}
