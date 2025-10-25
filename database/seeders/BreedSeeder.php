<?php

namespace Database\Seeders;

use App\Models\Breed;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breeds = [
            [
                "name" => "Guelmoise",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Cheurfa",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Chélifienne",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Sétifienne",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Kabyle",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Djerba",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Kabyle et Chaouia",
                "animal_type_id"=>1,
                'production_id'=>3
            ],
            [
                "name" => "mixte",
                "animal_type_id"=>1,
                'production_id'=> 3
            ],
            [
                "name" => "Holstein",
                "animal_type_id"=>1,
                'production_id'=>1
            ],
            [
                "name" => "Montbéliarde",
                "animal_type_id"=>2,
                'production_id'=>1
            ],
            [
                "name" => "Tarentaise",
                "animal_type_id"=>2,
                'production_id'=>1
            ],
            [
                "name" => "Charolaise",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Limousine",
                "animal_type_id"=>1,
                'production_id'=>2
            ],
            [
                "name" => "Brune",
                "animal_type_id"=>1,
                'production_id'=>1
            ],
            [
                "name" => "Autre",
                "animal_type_id"=>2,
                'production_id'=>3
            ],
            [
                "name" => "El Hamra (Deghma)",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Rembi",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Berbère",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Barbarine",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "D’men",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Sidaou",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Ouled Djellal",
                "animal_type_id"=>2,
                'production_id'=>2
            ],
            [
                "name" => "Autre",
                "animal_type_id"=>2,
                'production_id'=>3
            ],
            [
                "name" => "Makatia",
                "animal_type_id"=>3,
                'production_id'=>3
            ],
            [
                "name" => "M’Zabia",
                "animal_type_id"=>3,
                'production_id'=>3
            ],
            [
                "name" => "Kabyle",
                "animal_type_id"=>3,
                'production_id'=>3
            ],
            [
                "name" => "Arbia",
                "animal_type_id"=>3,
                 'production_id'=>3
            ],
            [
                "name" => "Alpine",
                "animal_type_id"=>3,
                 'production_id'=>1
            ],
            [
                "name" => "Maltaise",
                "animal_type_id"=>3,
                'production_id'=>1
            ],
            [
                "name" => "Saanen",
                "animal_type_id"=>3,
                'production_id'=>1
                

            ],
            [
                "name" => "Autre",
                "animal_type_id"=>3,
                'production_id'=>1
            ]
        ];

        foreach ($breeds as $key => $value) {
            $breed = new Breed();
            $breed->name = $value['name'];
            $breed->animal_type_id = $value['animal_type_id'];
            $breed->production_id = $value['production_id'];
            $breed->save();
        }
    }
}
