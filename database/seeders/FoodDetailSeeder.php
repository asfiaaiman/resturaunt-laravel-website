<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FoodDetail;
use App\Models\Foodtype;

class FoodDetailSeeder extends Seeder
{
    public function run(): void
    {
        $types = Foodtype::whereIn('slug', ['starters', 'mains', 'desserts', 'drinks'])
            ->get()
            ->keyBy('slug');

        if ($types->isEmpty()) {
            return;
        }

        $items = [
            [
                'name' => 'Garlic Bread',
                'price' => '4.95',
                'slug' => 'garlic-bread',
                'type' => 'starters',
                'description' => 'Toasted baguette with garlic butter and herbs.',
                'image' => 'website-assets/assets/img/menu/bread-barrel.jpg',
            ],
            [
                'name' => 'Classic Burger',
                'price' => '9.95',
                'slug' => 'classic-burger',
                'type' => 'mains',
                'description' => 'Grilled beef patty, cheese, salad, and our house sauce.',
                'image' => 'website-assets/assets/img/menu/tuscan-grilled.jpg',
            ],
            [
                'name' => 'Chocolate Lava Cake',
                'price' => '6.50',
                'slug' => 'chocolate-lava-cake',
                'type' => 'desserts',
                'description' => 'Warm chocolate cake with a soft, melted centre.',
                'image' => 'website-assets/assets/img/menu/cake.jpg',
            ],
            [
                'name' => 'Fresh Lemonade',
                'price' => '3.50',
                'slug' => 'fresh-lemonade',
                'type' => 'drinks',
                'description' => 'Homemade lemonade with fresh lemons and mint.',
                'image' => 'website-assets/assets/img/menu/greek-salad.jpg',
            ],
        ];

        foreach ($items as $item) {
            $foodtype = $types->get($item['type']);

            if (! $foodtype) {
                continue;
            }

            FoodDetail::updateOrCreate(
                ['name' => $item['name'], 'foodtype_id' => $foodtype->id],
                [
                    'price' => $item['price'],
                    'status' => '1',
                    'image' => $item['image'],
                    'description' => $item['description'],
                ]
            );
        }
    }
}


