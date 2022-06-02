<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = [

            [
                'user_id'    => 1,
                'mobile'     => '1234567890',
                'line1'      => '2125 Chesnut St.',
                'line2'      => '25 Darwind St.',
                'city'       => 'Cagayan',
                'province'   => 'Caloocan',
                'country'    => 'Philippines',
                'zipcode'    => '5511',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id'    => 2,
                'mobile'     => '09123456789',
                'line1'      => '123 Main Street Room 22',
                'line2'      => 'Shop 171 Westfield Beconnen Shopping Centre',
                'city'       => 'Belconnen',
                'province'   => 'ACT',
                'country'    => 'Australia',
                'zipcode'    => '1122',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($profiles as $profile) {
            Profile::create($profile);
        }
    }
}
