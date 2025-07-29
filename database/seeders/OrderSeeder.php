<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'customer')->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            Order::create([
                'user_id' => fake()->randomElement($users),
                'total_price' => 0,
                'status' => fake()->randomElement(['pending', 'paid', 'shipped', 'cancelled']),
            ]);
        }
    }
}
