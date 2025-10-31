<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {   // User::factory(10)->create();
        // $this->call([
        //     PemissionSeeder::class,
        //     RolesSeeder::class,
        //     RolesAndPermissionsSeeder::class,

        //     // Add any other seeder classes here
        // ]);
        $user = User::factory()->create([
            'name' => 'admin',
            'lastName' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);
        $user->assignRole('Admin');
    }
}
