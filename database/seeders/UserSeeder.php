<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus user admin jika ada
        User::where('email', 'bayu@gmail.com')->delete();

        // Buat user admin baru jika belum ada
        if (!User::where('email', 'bayu@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'bayu@gmail.com',
                'password' => Hash::make('admin123'),
            ]);
        }
    }
}
