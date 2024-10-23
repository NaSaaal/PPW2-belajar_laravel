<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Buat user admin atau update user yang ada
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // Ganti dengan email user admin yang Anda inginkan
            [
                'name' => 'Admin User',
                'password' => bcrypt('password123'), // Pastikan mengganti dengan password yang aman
                'level' => 'admin', // Set level ke admin
            ]
        );
    }
}
