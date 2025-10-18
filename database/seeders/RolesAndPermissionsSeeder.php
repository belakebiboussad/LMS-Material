<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wnerRole = Role::create(['name' => 'Owner']);
        Role::create(['name' => 'user']);
        $wnerRole->givePermissionTo('animals.create');
        $wnerRole->givePermissionTo('animals.update');
        $wnerRole->givePermissionTo('animals.view');
        $wnerRole->givePermissionTo('animals.delete');
        //
        $wnerRole->givePermissionTo('breeds.create');
        $wnerRole->givePermissionTo('breeds.update');
        $wnerRole->givePermissionTo('breeds.view');
        $wnerRole->givePermissionTo('breeds.delete');
        //
        $wnerRole->givePermissionTo('vaccins.create');
        $wnerRole->givePermissionTo('vaccins.update');
        $wnerRole->givePermissionTo('vaccins.view');
        $wnerRole->givePermissionTo('vaccins.delete');
        //
        $wnerRole->givePermissionTo('treatment.create');
        $wnerRole->givePermissionTo('treatment.update');
        $wnerRole->givePermissionTo('treatment.view');
        $wnerRole->givePermissionTo('treatment.delete');
    }
}
