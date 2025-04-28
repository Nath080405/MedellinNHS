<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Example student user
        User::create([
            'name' => 'Mae Matanog',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'Mae Matanog',
            'email' => 'admin2@example.com',
            'password' => Hash::make('admin2'),
            'role' => 'admin',
        ]);
        
        // Add more if you want
        User::create([
            'name' => 'Nathaniel R. Kiskisan',
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher'),
            'role' => 'teacher',
        ]);

        User::create([
            'name' => 'Leslie Lumapac',
            'email' => 'student@example.com',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);
    }
}

