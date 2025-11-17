<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Création de 5 utilisateurs
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Michael Johnson',
            'email' => 'michael.johnson@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'Emily Davis',
            'email' => 'emily.davis@example.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name' => 'William Brown',
            'email' => 'william.brown@example.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
