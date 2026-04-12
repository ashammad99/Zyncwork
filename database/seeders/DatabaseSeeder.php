<?php

namespace Database\Seeders;

use App\Features\Auth\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->createMany(
            [
                [
                    'name' => 'Employee user',
                    'email' => 'emp@example.com',
                    'password' => Hash::make('12345678'),
                    'role' => 'employee',
                    'is_active' => true,
                    'profile_image' => null,
                    'last_login_at' => null,
                    'last_login_ip' => null,
                ],
                [
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('12345678'),
                    'role' => 'admin',
                    'is_active' => true,
                    'profile_image' => null,
                    'last_login_at' => null,
                    'last_login_ip' => null,
                ],
                [
                    'name' => 'Manager User',
                    'email' => 'manager@example.com',
                    'password' => Hash::make('12345678'),
                    'role' => 'manager',
                    'is_active' => true,
                    'profile_image' => null,
                    'last_login_at' => null,
                    'last_login_ip' => null,
                ]
            ]
        );
    }
}
