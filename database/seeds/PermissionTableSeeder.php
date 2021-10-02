<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'dashboard-list',
            'vendor-menu',
            'admin-menu',
        ];


        foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
        }
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Vendor']);
        Role::create(['name' => 'Trader']);
        Role::create(['name' => 'Farmer']);
        Role::create(['name' => 'RentingLabs']);
    }
}
