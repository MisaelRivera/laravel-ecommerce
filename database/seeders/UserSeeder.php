<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'administrador@example.com',
            'password' => Hash::make('password'),
            'phone' => '123456789',
            'role' => 'admin',
            'address' => 'Direccion del administrador'
        ]);

        for ($i = 0; $i < 40; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => Hash::make('password'),
                'phone' => fake()->phoneNumber(),
                'role' => 'customer',
                'address' => fake()->address(),
            ]);
        }
    }
}
