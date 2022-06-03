<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        $permissions = [
            'admin-access',
            'category-create',
            'category-edit',
            'category-show',
            'category-delete',
            'contact-create',
            'contact-edit',
            'contact-show',
            'contact-delete',
            'coupon-create',
            'coupon-edit',
            'coupon-show',
            'coupon-delete',
            'order-create',
            'order-edit',
            'order-show',
            'order-delete',
            'product-create',
            'product-edit',
            'product-show',
            'product-delete',
            'about-create',
            'about-edit',
            'about-show',
            'about-delete',
            'homeslider-create',
            'homeslider-edit',
            'homeslider-show',
            'homeslider-delete',
            'footerinfo-create',
            'footerinfo-edit',
            'footerinfo-show',
            'footerinfo-delete',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',

        ];

        foreach($permissions as $permission){
            Permission::create([
                'guard_name' => 'web',
                'name' => $permission
            ]);
        }



        // gets all permissinos via Gate::before rule; see AuthServiceProvider
        Role::create(['name'=>'super-admin']);



        // Admin Normal Role Start
        $roleAdmin = Role::create(['guard_name' => 'web', 'name' => 'admin']);

        $adminPermissions = [
            'admin-access',
            'category-create',
            'category-edit',
            'category-show',
            'category-delete',
            'contact-create',
            'contact-edit',
            'contact-show',
            'contact-delete',
            'coupon-create',
            'coupon-edit',
            'coupon-show',
            'coupon-delete',
            'order-create',
            'order-edit',
            'order-show',
            'order-delete',
            'product-create',
            'product-edit',
            'product-show',
            'product-delete',
            'about-create',
            'about-edit',
            'about-show',
            'about-delete',
            'homeslider-create',
            'homeslider-edit',
            'homeslider-show',
            'homeslider-delete',
            'footerinfo-create',
            'footerinfo-edit',
            'footerinfo-show',
            'footerinfo-delete',
            'role-create',
            'role-edit',
            'role-show',
            'role-delete',
            'permission-create',
            'permission-edit',
            'permission-show',
            'permission-delete',
        ];

        foreach($adminPermissions as $permission){
            $roleAdmin->givePermissionTo($permission);
        }
        // Admin Normal Role End





    }
}
