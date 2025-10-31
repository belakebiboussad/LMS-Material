<?php

namespace Database\Seeders;
use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class colorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            [
                "name" => "Red",
                "hexCode" =>'#FF0000'
            ],
            [
                "name" => "Green",
                "hexCode" =>'#00FF00'
            ],
            [
                "name" => "Blue",
                "hexCode" => '#0000FF'
            ],
            [
                "name" => "Black",
                "hexCode" => '#000000'
            ],
            [
                "name" => "White",
                "hexCode" => '#FFFFFF'
            ],
            [
                "name" => "Yellow",
                "hexCode" => '#FFFF00'
            ],
            [
                "name" => "Cyan",
                "hexCode" => '#00FFFF'
            ],
            [
                "name" => "Magenta",
                "hexCode" => '#FF00FF'
            ],
            [
                "name" => "Gray",
                "hexCode" => '#808080'
            ],
            [
                "name" => "Beige",
                "hexCode" => ''
            ],
            [
                "name" => "Orange",
                "hexCode" => '#FFA500'
            ],
            [
                "name" => "Azure",
                "hexCode" => '#F0FFFF'
            ],
            [
                "name" => "Aquamarine",
                "hexCode" => '#7FFFD4'
            ],
            [
                "name" => "Brown",
                "hexCode" => '#A52A2A'
            ],
            [
                "name" => "Chocolate",
                "hexCode" => '#D2691E'
            ],
            [
                "name" => "DarkBlue",
                "hexCode" => '#00008B'
            ],
            [
                "name" => "DarkGreen",
                "hexCode" => '#006400'
            ],
            [
                "name" => "DarkRed",
                "hexCode" => '#8B0000'
            ],
            [
                "name" => "DarkOrange",
                "hexCode" => '#FF8C00'
            ],
            [
                "name" => "DarkTurquoise",
                "hexCode" => '#00CED1'
            ],
            [
                "name" => "DeepPink",
                "hexCode" => '#FF1493'
            ],
            [
                "name" => "FloralWhite",
                "hexCode" => '#FFFAF0'
            ]

        ];
         //iterate all permissions and store into the permission table
        foreach ($colors as $key => $value) {
            $color = new Color;
            $color->name = $value['name'];
            $color->hexCode = $value['hexCode'];
            $color->save();
        }
    }
}
