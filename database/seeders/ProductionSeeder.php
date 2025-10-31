<?php

namespace Database\Seeders;

use App\Models\Production;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productions = [
            [
                'name'=>'Lait'
            ],
            [
                'name'=>'Viande'
            ],
            [
                'name'=>'Mixte'
            ]
            ];
            foreach ($productions as $key => $value) {
                $production = new Production();
                $production->name = $value['name'];
                $production->save();
            }
    }
}
