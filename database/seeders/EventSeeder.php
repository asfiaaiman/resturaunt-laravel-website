<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Birthday Parties',
                'slug' => 'birthday-parties',
                'price' => '189',
                'short_description' => 'Perfect birthday celebrations with custom menus and decorations.',
                'description' => 'Celebrate your special day with us. We take care of the details so you can enjoy the moment with your guests.',
                'bullet_1' => 'Customizable birthday menus for all ages.',
                'bullet_2' => 'Decorations and music tailored to your taste.',
                'bullet_3' => 'Dedicated staff to serve your guests.',
                'image' => 'website-assets/assets/img/event-birthday.jpg',
                'status' => '1',
            ],
            [
                'title' => 'Private Parties',
                'slug' => 'private-parties',
                'price' => '290',
                'short_description' => 'Host your private gatherings in our cozy and stylish spaces.',
                'description' => 'Whether it is a family reunion or a business dinner, our private rooms create the perfect atmosphere.',
                'bullet_1' => 'Exclusive use of private dining rooms.',
                'bullet_2' => 'Flexible seating arrangements.',
                'bullet_3' => 'Custom food and drink packages.',
                'image' => 'website-assets/assets/img/event-private.jpg',
                'status' => '1',
            ],
            [
                'title' => 'Custom Parties',
                'slug' => 'custom-parties',
                'price' => '99',
                'short_description' => 'Design your own event experience from start to finish.',
                'description' => 'Tell us your idea and we will turn it into a memorable event with great food and ambiance.',
                'bullet_1' => 'Tailor-made menus and layouts.',
                'bullet_2' => 'Support for themes and special requests.',
                'bullet_3' => 'Ideal for small and medium-sized groups.',
                'image' => 'website-assets/assets/img/event-custom.jpg',
                'status' => '1',
            ],
        ];

        foreach ($events as $event) {
            Event::updateOrCreate(
                ['slug' => $event['slug']],
                $event
            );
        }
    }
}


