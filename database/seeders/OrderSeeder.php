<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
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
        Order::factory(20)->create()->each(function ($order) {
            $products = Product::factory(3)->create();

            foreach ($products as $product) {
                $order->products()->attach($product, [
                    'product_name' => $product->name,
                    'unit_price' => $product->unit_price,
                    'quantity' => rand(1, 10),
                ]);
            }
        });
    }
}
