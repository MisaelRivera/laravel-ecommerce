<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'customer')->get();
        $products = Product::pluck('id')->toArray();

        foreach($users as $user) {
            $numWishlists = fake()->numberBetween(5, 10);
            
            for ($i = 0; $i < $numWishlists; $i++) {
                Wishlist::create([
                    'user_id' => $user->id,
                    'product_id' =>fake()->randomElement($products),
                ]);
            }
        }
    }
}
