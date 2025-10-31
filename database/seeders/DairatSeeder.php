<?php

namespace Database\Seeders;

use App\Models\Daira;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DairatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dairas = [
            [
                "name" => "Adrar",
                "wilaya_id" => 1
            ],
            [
                "name" => "Aoulef",
                "wilaya_id" => 1
            ],
            [
                "name" => "Aougrout",
                "wilaya_id" => 1
            ],
            [
                "name" => "Charouine",
                "wilaya_id" => 1
            ],
            [
                "name" => "Fenoughil",
                "wilaya_id" => 1
            ],
            [
                "name" => "Reggane",
                "wilaya_id" => 1
            ],
            [
                "name" => "Tinerkouk",
                "wilaya_id" => 1
            ],
            [
                "name" => "Tsabit",
                "wilaya_id" => 1
            ],
            [
                "name" => "Chlef",
                "wilaya_id" => 2
            ],
            [
                "name" => "Abou El Hassan",
                "wilaya_id" => 2
            ],
            [
                "name" => "El Karimia",
                "wilaya_id" => 2
            ],
            [
                "name" => "Beni Haoua",
                "wilaya_id" => 2
            ],
            [
                "name" => "Ouled Fares",
                "wilaya_id" => 2
            ],
            [
                "name" => "El Marsa",
                "wilaya_id" => 2
            ],
            [
                "name" => "Taougrite",
                "wilaya_id" => 2
            ],
            [
                "name" => "Oued Fodda",
                "wilaya_id" => 2
            ],
            [
                "name" => "Ténès",
                "wilaya_id" => 2
            ],
            [
                "name" => "Ouled Ben Abdelkader",
                "wilaya_id" => 2
            ],
            [
                "name" => "Aïn Merane",
                "wilaya_id" => 2
            ],
            [
                "name" => "Boukadir",
                "wilaya_id" => 2
            ],
            [
                "name" => "Zeboudja",
                "wilaya_id" => 2
            ],
            [
                "name" => "Laghouat",
                "wilaya_id" => 3
            ],
            [
                "name" => "Aflou",
                "wilaya_id" => 3
            ],
            [
                "name" => "Aïn Madhi",
                "wilaya_id" => 3
            ],
            [
                "name" => "Brida",
                "wilaya_id" => 3
            ],
            [
                "name" => "El Ghicha",
                "wilaya_id" => 3
            ],
            [
                "name" => "Gueltet Sidi Saâd",
                "wilaya_id" => 3
            ],
            [
                "name" => "Hassi R\'Mel'",
                "wilaya_id" => 3
            ],
            [
                "name" => "Ksar El Hirane",
                "wilaya_id" => 3
            ],
            [
                "name" => "Oued Morra",
                "wilaya_id" => 3
            ],
            [
                "name" => "Sidi Makhlouf",
                "wilaya_id" => 3
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Oum El Bouaghi",
                "wilaya_id" => 4
            ],
            [
                "name" => "Batna",
                "wilaya_id" => 5
            ],
            [
                "name" => "Béjaia",
                'wilaya_id' => 6
            ],
            [
                "name" => "Biskra",
                "wilaya_id" => 7
            ],
            [
                "name" => "Béchar",
                "wilaya_id" => 8
            ],
            [
                "name" => "Blida",
                "wilaya_id" => 9
            ],
            [
                "name" => "Bouira",
                "wilaya_id" => 10
            ],
            [
                "name" => "Tamanrasset",
                "wilaya_id" => 11
            ],
            [
                "name" => "Tébessa",
                "wilaya_id" => 12
            ],
            [
                "name" => "Tlemcen",
                "wilaya_id" => 13
            ],
            [
                "name" => "Tiaret",
                "wilaya_id" => 14
            ],
            [
                "name" => "Tizi Ouzou",
                ""
            ],

            [
                "name" => "Alger",
                "wilaya_id" => 16
            ],
            [
                "name" => "Djelfa",
                "wilaya_id" => 17
            ],
            [
                "name" => "Jijel",
                "wilaya_id" => 18
            ],
            [
                "name" => "Sétif",
                ""
            ],
            [
                "name" => "Saida",
                "wilaya_id" => 20
            ],
            [
                "name" => "Skikda",
                "wilaya_id" => 21
            ],
            [
                "name" => "Sidi Bel Abbès",
                "wilaya_id" => 22
            ],
            [
                "name" => "Annaba",
                "wilaya_id" => 23
            ],
            [
                "name" => "Guelma",
                "wilaya_id" => 24
            ],
            [
                "name" => "Constantine",
                "wilaya_id" => 25
            ],
            [
                "name" => "Médèa",
                "wilaya_id" => 26
            ],
            [
                "name" => "Mostaganem",
                "wilaya_id" => 27
            ],
            [
                "name" => "M\'Sila",
                ""
            ],
            [
                "name" => "Mascara",
                ""
            ],
            [
                "name" => "Ouargla",
                ""
            ],
            [
                "name" => "Oran",
                ""
            ],
            [
                "name" => "El Bayadh",
                "wilaya_id" => 32
            ],
            [
                "name" => "Illizi",
                "wilaya_id" => 33
            ],
            [
                "name" => "Bordj Bou Arreridj",
                "wilaya_id" => 34
            ],
            [
                "name" => "Boumerdès",
                "wilaya_id" => 35
            ],
            [
                "name" => "El Tarf",
                "wilaya_id" => 36
            ],
            [
                "name" => "Tindouf",
                "wilaya_id" => 37
            ],
            [
                "name" => "Tissemsilt",
                "wilaya_id" => 38
            ],

            [
                "name" => "El Oued",
                "wilaya_id" => 39
            ],
            [
                "name" => "Khenchela",
                "wilaya_id" => 40
            ],
            [
                "name" => "Souk Ahras",
                "wilaya_id" => 41
            ],
            [
                "name" => "Tipaza",
                "wilaya_id" => 42
            ],
            [
                "name" => "Mila",
                "wilaya_id" => 43
            ],
            [
                "name" => "Ain Defla",
                "wilaya_id" => 44
            ],
            [
                "name" => "Naâma",
                "wilaya_id" => 45
            ],
            [
                "name" => "Ain Témouchent",
                "wilaya_id" => 46
            ],
            [
                "name" => "Ghardaia",
                "wilaya_id" => 47
            ],
            [
                "name" => "Relizane",
                "wilaya_id" => 48
            ],
            [
                "name" => "Timimoun",
                "wilaya_id" => 49
            ],
            [
                "name" => "Bordj Badji Mokhtar",
                "wilaya_id" => 50
            ],
            [
                "name" => "Ouled Djellal",
                "wilaya_id" => 51
            ],
            [
                "name" => "Béni Abbès",
                "wilaya_id" => 52
            ],
            [
                "name" => "In Salah",
                "wilaya_id" => 53
            ],
            [
                "name" => "In Guezzam",
                "wilaya_id" => 54
            ],
            [
                "name" => "Touggourt",
                "wilaya_id" => 55
            ],
            [
                "name" => "Djanet",
                "wilaya_id" => 56
            ],
            [
                "name" => "El M\'Ghair",
                "wilaya_id" => 57
            ],
            [
                "name" => "El Meniaa",
                "wilaya_id" => 58
            ],
            [
                "name" => "Autre",
                "wilaya_id" => 59

            ],

        ];
        foreach ($$dairas as $key => $value) {
            $d = new Daira();
            $d->name = $value['name'];
            $d->wilaya_id = $value['daira_id'];
            $d->save();
        }
    }
}
