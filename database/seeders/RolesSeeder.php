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
        // create a Admin role
        $role = new Role;
        $role->name = 'Admin';
        $role->save();

        //Retrive all permissions
        $permissions = Permission::get();
        foreach ($permissions as $key => $permission) {
            // Assign all permission to the role
            $role->givePermissionTo($permission->name);
        }
    }
}
