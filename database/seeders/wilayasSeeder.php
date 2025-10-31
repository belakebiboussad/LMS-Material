<?php

namespace Database\Seeders;

use App\Models\Wilaya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class wilayasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $wilayas = [
            [
                "name" => "Adrar"
            ],
            [
                "name" => "Chlef"
            ],
            [
                "name" => "Laghouat"
            ],
            [
                "name" => "Oum El Bouaghi"
            ],
            [
                "name" => "Batna"
            ],
            [
                "name" => "Béjaia"
            ],
            [
                "name" => "Biskra"
            ],
            [
                "name" => "Béchar"
            ],
            [
                "name" => "Blida"
            ],
            [
                "name" => "Bouira"
            ],
            [
                "name" => "Tamanrasset"
            ],
            [
                "name" => "Tébessa"
            ],
            [
                "name" => "Tlemcen"
            ],
            [
                "name" => "Tiaret"
            ],
            [
                "name" => "Tizi Ouzou"
            ],

            [
                "name" => "Alger"
            ],
            [
                "name" => "Djelfa"
            ],
            [
                "name" => "Jijel"
            ],
            [
                "name" => "Sétif"
            ],
            [
                "name" => "Saida"
            ],
            [
                "name" => "Skikda"
            ],
            [
                "name" => "Sidi Bel Abbès"
            ],
            [
                "name" => "Annaba"
            ],
            [
                "name" => "Guelma"
            ],
            [
                "name" => "Constantine"
            ],
            [
                "name" => "Médèa"
            ],
            [
                "name" => "Mostaganem"
            ],
            [
                "name" => "M\'Sila"
            ],
            [
                "name" => "Mascara"
            ],
            [
                "name" => "Ouargla"
            ],
            [
                "name" => "Oran"
            ],
            [
                "name" => "El Bayadh"
            ],
            [
                "name" => "Illizi"
            ],
            [
                "name" => "Bordj Bou Arreridj"
            ],
            [
                "name" => "Boumerdès"
            ],
            [
                "name" => "El Tarf"
            ],
            [
                "name" => "Tindouf"
            ],
            [
                "name" => "Tissemsilt"
            ],

            [
                "name" => "El Oued"
            ],
            [
                "name" => "Khenchela"
            ],
            [
                "name" => "Souk Ahras"
            ],
            [
                "name" => "Tipaza"
            ],
            [
                "name" => "Mila"
            ],
            [
                "name" => "Ain Defla"
            ],
            [
                "name" => "Naâma"
            ],
            [
                "name" => "Ain Témouchent"
            ],
            [
                "name" => "Ghardaia"
            ],
            [
                "name" => "Relizane"
            ],
            [
                "name" => "Timimoun"
            ],
            [
                "name" => "Bordj Badji Mokhtar"
            ],
            [
                "name" => "Ouled Djellal"
            ],
            [
                "name" => "Béni Abbès"
            ],
            [
                "name" => "In Salah"
            ],
            [
                "name" => "In Guezzam"
            ],
            [
                "name" => "Touggourt"
            ],
            [
                "name" => "Djanet"
            ],
            [
                "name" => "El M\'Ghair"
            ],
            [
                "name" => "El Meniaa"
            ],
            [
                "name" => "Autre"
            ],

        ];
        foreach ($wilayas as $key => $value) {
            $wilaya = new Wilaya();
            $wilaya->name = $value['name'];
            $wilaya->save();
        }
    }
}
