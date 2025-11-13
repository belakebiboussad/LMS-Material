<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PemissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $permissions = [
            [
                "name" => "roles.create"
            ],
            [
                "name" => "roles.update"
            ],
            [
                "name" => "roles.view"
            ],
            [
                "name" => "roles.delete"
            ],
            [
                "name" => "permissions.create"
            ],
            [
                "name" => "permissions.update"
            ],
            [
                "name" => "permissions.view"
            ],
            [
                "name" => "permissions.delete"
            ],
            [
                "name" => "tags.create"
            ],
            [
                "name" => "tags.update"
            ],
            [
                "name" => "tags.view"
            ],
            [
                "name" => "tags.delete"
            ],
            [
                "name" => "users.create"
            ],
            [
                "name" => "users.update"
            ],
            [
                "name" => "users.view"
            ],
            [
                "name" => "users.delete"
            ],
            [
                "name" => "owners.create"
            ],
            [
                "name" => "owners.update"
            ],
            [
                "name" => "owners.view"
            ],
            [
                "name" => "owners.delete"
            ],
            [
                "name" => "animals.create"
            ],
            [
                "name" => "animals.update"
            ],
            [
                "name" => "animals.view"
            ],
            [
                "name" => "animals.delete"
            ],
            [
                "name" => "breeds.create"
            ],
            [
                "name" => "breeds.update"
            ],
            [
                "name" => "breeds.view"
            ],
            [
                "name" => "breeds.delete"
            ],
            [
                "name" => "vaccinations.create"
            ],
            [
                "name" => "vaccinations.update"
            ],
            [
                "name" => "vaccinations.view"
            ],
            [
                "name" => "vaccinations.delete"
            ],
            [
                "name" => "treatments.create"
            ],
            [
                "name" => "treatments.update"
            ],
            [
                "name" => "treatments.view"
            ],
            [
                "name" => "treatments.delete"
            ],
            [
                "name" => "movement.create"
            ],
            [
                "name" => "movement.update"
            ],
            [
                "name" => "movement.view"
            ],
            [
                "name" => "movement.delete"
            ],

        ];
        //iterate all permissions and store into the permission table
        foreach ($permissions as $key => $value) {
            $permission = new Permission;
            $permission->name = $value['name'];
            $permission->save();
        }
    }
}
