<?php

namespace Database\Seeders;

use App\Models\FooterInformation;
use Illuminate\Database\Seeder;

class FooterInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infos = [

            // type = 1 Country
            ['name' => 'Philippines',   'link' => '#',  'type' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'India',         'link' => '#',  'type' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Japan',         'link' => '#',  'type' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'USA',           'link' => '#',  'type' => 1,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Germany',       'link' => '#',  'type' => 1,  'created_at' => now(), 'updated_at' => now()],

            // type = 2 Contact
            ['name' => '123-1234-123',      'link' => '#',  'type' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => '222-2222-222',      'link' => '#',  'type' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'guro@gmail.com',    'link' => '#',  'type' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'lable@gmail.com',   'link' => '#',  'type' => 2,  'created_at' => now(), 'updated_at' => now()],
            ['name' => '123 Manila ST.',    'link' => '#',  'type' => 2,  'created_at' => now(), 'updated_at' => now()],

            // type = 3 Social Media
            ['name' => 'Facebook',  'link' => 'https://facebook.com/',  'type' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Twitter',   'link' => 'https://twitter.com/',   'type' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Instagram', 'link' => 'https://instagram.com/', 'type' => 3,  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Linkedin',  'link' => 'https://linkedin.com/',  'type' => 3,  'created_at' => now(), 'updated_at' => now()],



        ];

        foreach ($infos as $info) {
            FooterInformation::create($info);
        }
    }
}
