<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // Hapus user test jika ada
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
