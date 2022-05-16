<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::factory()->create([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('super-admin');

        $adminUser = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('admin');
    }
}
