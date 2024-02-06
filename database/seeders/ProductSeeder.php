<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Crafter;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        OrderProduct::all()->each(function ($order) {
//            Product::factory()->create(['product_id' => $order->id]);
//        });
//        $categories = Category::factory()->count(5)->create();
        //need to build product and after attach the model Category
        Product::factory(50)->create()->each(function($product){
            $categories = Category::inRandomOrder()->first();
            $product->categories()->attach($categories);
//            $crafters= Crafter::inRandomOrder()->first();
//            $product->crafters()->attach($crafters);
        });
    }
}
