<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        $products = Product::pluck('id')->toArray();

        foreach($orders as $order) {
            $numItems = fake()->numberBetween(1, 5);
            $total = 0;

            for ($i = 0; $i < $numItems; $i++) {
                $productId = fake()->randomElement($products);
                $price = fake()->randomFloat(2, 5, 500);
                $quantity = fake()->numberBetween(1, 3);
                $subtotal = $price * $quantity;

                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal
                ]);
            }

            $order->update(['total_price' => $total]);
        }
    }
}
