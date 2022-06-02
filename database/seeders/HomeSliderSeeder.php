<?php

namespace Database\Seeders;

use App\Models\HomeSlider;
use Illuminate\Database\Seeder;

class HomeSliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sliders = [

            [
                'title'             => 'Spicy Noodles',
                'subtitle'          => 'Our Special Dish',
                'short_description' => 'Lorem Ipsum Dolor sit amet Consectetuer adipiscing elit. Sit Natus Dolor Cumque?',
                'status'            => 1,
                'image'             => '1.png',
                'product_id'        => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'title'             => 'Lechon Manok',
                'subtitle'          => 'Our Special Dish',
                'short_description' => 'Lorem Ipsum Dolor sit amet Consectetuer adipiscing elit. Sit Natus Dolor Cumque?',
                'status'            => 1,
                'image'             => '2.png',
                'product_id'        => 4,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'title'             => 'Hot Pizza',
                'subtitle'          => 'Our Special Dish',
                'short_description' => 'Lorem Ipsum Dolor sit amet Consectetuer adipiscing elit. Sit Natus Dolor Cumque?',
                'status'            => 1,
                'image'             => '3.png',
                'product_id'        => 15,
                'created_at'        => now(),
                'updated_at'        => now(),
            ],

        ];

        foreach ($sliders as $slide) {
            HomeSlider::create($slide);
        }
    }
}
