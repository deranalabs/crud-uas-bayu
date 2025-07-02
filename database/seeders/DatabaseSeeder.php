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
        \App\Models\User::where('email', 'bayu@gmail.com')->delete();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'bayu@gmail.com',
        ]);
    }
}
