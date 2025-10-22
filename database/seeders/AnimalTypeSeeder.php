<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = new AnimalType;
        $type->name = 'bovin';
        $type->save();
        $type = new AnimalType;
        $type->name = 'ovin';
        $type->save();
        $type = new AnimalType;
        $type->name = 'caprin';
        $type->save();
    }
}
