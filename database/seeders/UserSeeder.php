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
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);
        
        // Add more if you want
        User::create([
            'name' => 'Jane Smith',
            'email' => 'student@example.com',
            'password' => Hash::make('student'),
            'role' => 'student',
        ]);
    }
}

