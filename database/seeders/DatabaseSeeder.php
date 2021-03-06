<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionSeeder::class,
            AdminUserSeeder::class,
            ProfileSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            AboutSeeder::class,
            HomeSliderSeeder::class,
            FooterInformationSeeder::class
        ]);
    }
}
