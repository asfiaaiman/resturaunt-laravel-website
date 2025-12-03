<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Foodtype;

class FoodtypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'Starters', 'slug' => 'starters'],
            ['name' => 'Mains', 'slug' => 'mains'],
            ['name' => 'Desserts', 'slug' => 'desserts'],
            ['name' => 'Drinks', 'slug' => 'drinks'],
        ];

        foreach ($types as $type) {
            Foodtype::updateOrCreate(
                ['slug' => $type['slug']],
                [
                    'name' => $type['name'],
                    'status' => '1',
                ]
            );
        }
    }
}


