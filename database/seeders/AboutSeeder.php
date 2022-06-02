<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $abouts = [

            // Burger category
            [
                'title'             => 'Best Food In The Country',
                'short_description' => '<p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit. Dolore, Sequi Corrupti Corporis Quaerat Voluptatem Ipsam Neque Labore Modi Autem, Saepe Numquam Quod Reprehenderit Rem? Tempora Aut Soluta Odio Corporis Nihil!</p>
                                        <p>Lorem Ipsum Dolor Sit Amet, Consectetur Adipisicing Elit. Aperiam, Nemo. Sit Porro Illo Eos Cumque Deleniti Iste Alias, Eum Natus.</p>',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
        ];

        foreach ($abouts as $about) {
            About::create($about);
        }
    }
}
