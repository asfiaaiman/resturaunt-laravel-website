<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\FoodtypeSeeder;
use Database\Seeders\FoodDetailSeeder;
use Database\Seeders\EventSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FoodtypeSeeder::class,
            FoodDetailSeeder::class,
            EventSeeder::class,
        ]);
    }
}
