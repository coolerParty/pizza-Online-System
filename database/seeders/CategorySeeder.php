<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [

            // news
            ['name' => 'Burger',    'slug' => 'burger',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Chicken',   'slug' => 'chicken',    'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Desserts',  'slug' => 'desserts',   'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Drinks',    'slug' => 'drinks',     'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pizza',     'slug' => 'pizza',      'created_at' => now(), 'updated_at' => now()],



        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
