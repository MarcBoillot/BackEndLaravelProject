<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //call all the seeders for the database
        $this->call([
            UserSeeder::class,
            CrafterSeeder::class,
            AddressSeeder::class,
            CategorySeeder::class,
            MaterialSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
