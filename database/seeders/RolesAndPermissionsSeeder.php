<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::create(['name' => 'farmer']);
        // Role::create(['name' => 'guardian']);
        // Role::create(['name' => 'vet']);
        $permissionNames = [
            'animals.create',
            'animals.update',
            'animals.view',
            'animals.delete',
            'breeds.create',
            'breeds.update',
            'breeds.view',
            'breeds.delete',
            'farms.create',
            'farms.update',
            'farms.view',
            'farms.delete',
            'tags.create',
            'tags.update',
            'tags.view',
        ];
        $roleNames = ['farmer', 'guardian']; // Example role names
        $permissions = Permission::whereIn('name', $permissionNames)->get();
        foreach ($roleNames as $roleName) {
            $role = Role::findByName($roleName);
            if ($role) {
                $role->syncPermissions($permissions);
            }
        }

        $permissionNames = [
            'vaccinations.create',
            'vaccinations.update',
            'vaccinations.view',
            'vaccinations.delete',
            'treatments.create',
            'treatments.update',
            'treatments.view',
            'treatments.delete',
        ];
        $roleNames = ['vet']; // Example role names
        $permissions = Permission::whereIn('name', $permissionNames)->get();
        foreach ($roleNames as $roleName) {
            $role = Role::findByName($roleName);
            if ($role) {
                $role->syncPermissions($permissions);
            }
        }
    }
}
