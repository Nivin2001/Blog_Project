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
        //
         // Creating 5 users
         User::create([
            'username' => 'user1',
            'email' => 'user1@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'is_admin' => 0,
            'is_active' => 1,
            'password' => Hash::make('Password@123'),
        ]);

        User::create([
            'username' => 'user2',
            'email' => 'user2@example.com',
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'is_admin' => 1,
            'is_active' => 1,
            'password' => Hash::make('Password@123'),
        ]);

        User::create([
            'username' => 'user3',
            'email' => 'user3@example.com',
            'first_name' => 'Alice',
            'last_name' => 'Smith',
            'is_admin' => 0,
            'is_active' => 1,
            'password' => Hash::make('Password@123'),
        ]);

        User::create([
            'username' => 'user4',
            'email' => 'user4@example.com',
            'first_name' => 'Bob',
            'last_name' => 'Johnson',
            'is_admin' => 0,
            'is_active' => 1,
            'password' => Hash::make('Password@123'),
        ]);

        User::create([
            'username' => 'user5',
            'email' => 'user5@example.com',
            'first_name' => 'Eve',
            'last_name' => 'Williams',
            'is_admin' => 1,
            'is_active' => 1,
            'password' => Hash::make('Password@123'),
        ]);
    }
}


