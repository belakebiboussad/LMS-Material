<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role;
        $role->name = 'admin';
        $role->save();

        $permissions = Permission::get();
        foreach ($permissions as $key => $permission) {
            $role->givePermissionTo($permission->name);
        }
    }
}
