<?php

namespace Database\Seeders\Master\Penyakit;

use App\Models\Master\Penyakit\GejalaPenyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            // Influenza
            [
                'id_gejala_penyakit' => "GJL-P-2003061",
                'penyakit_id' => 1,
                'gejala_id' => 1,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003062",
                'penyakit_id' => 1,
                'gejala_id' => 3,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003063",
                'penyakit_id' => 1,
                'gejala_id' => 7,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003091",
                'penyakit_id' => 1,
                'gejala_id' => 21,
                'value_cf' => 0.2
            ],

            // DBD
            [
                'id_gejala_penyakit' => "GJL-P-2003064",
                'penyakit_id' => 2,
                'gejala_id' => 2,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003065",
                'penyakit_id' => 2,
                'gejala_id' => 17,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003066",
                'penyakit_id' => 2,
                'gejala_id' => 18,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003067",
                'penyakit_id' => 2,
                'gejala_id' => 20,
                'value_cf' => 0.4
            ],

            // Hepatitis
            [
                'id_gejala_penyakit' => "GJL-P-2003068",
                'penyakit_id' => 3,
                'gejala_id' => 1,
                'value_cf' => 0.6
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003069",
                'penyakit_id' => 3,
                'gejala_id' => 14,
                'value_cf' => 0.6
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003070",
                'penyakit_id' => 3,
                'gejala_id' => 15,
                'value_cf' => 0.6
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003071",
                'penyakit_id' => 3,
                'gejala_id' => 16,
                'value_cf' => 0.6
            ],

            // Malaria
            [
                'id_gejala_penyakit' => "GJL-P-2003072",
                'penyakit_id' => 4,
                'gejala_id' => 2,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003073",
                'penyakit_id' => 4,
                'gejala_id' => 5,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003074",
                'penyakit_id' => 4,
                'gejala_id' => 6,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003075",
                'penyakit_id' => 4,
                'gejala_id' => 11,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003076",
                'penyakit_id' => 4,
                'gejala_id' => 12,
                'value_cf' => 0.2
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003077",
                'penyakit_id' => 4,
                'gejala_id' => 13,
                'value_cf' => 0.2
            ],

            // Campak
            [
                'id_gejala_penyakit' => "GJL-P-2003078",
                'penyakit_id' => 5,
                'gejala_id' => 1,
                'value_cf' => 0.8
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003079",
                'penyakit_id' => 5,
                'gejala_id' => 3,
                'value_cf' => 0.8
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003080",
                'penyakit_id' => 5,
                'gejala_id' => 10,
                'value_cf' => 0.8
            ],

            // Tifus
            [
                'id_gejala_penyakit' => "GJL-P-2003081",
                'penyakit_id' => 6,
                'gejala_id' => 1,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003082",
                'penyakit_id' => 6,
                'gejala_id' => 4,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003083",
                'penyakit_id' => 6,
                'gejala_id' => 5,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003084",
                'penyakit_id' => 6,
                'gejala_id' => 8,
                'value_cf' => 0.4
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003085",
                'penyakit_id' => 6,
                'gejala_id' => 9,
                'value_cf' => 0.4
            ],

            // Cacingan
            [
                'id_gejala_penyakit' => "GJL-P-2003086",
                'penyakit_id' => 7,
                'gejala_id' => 4,
                'value_cf' => 1
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003087",
                'penyakit_id' => 7,
                'gejala_id' => 5,
                'value_cf' => 1
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003088",
                'penyakit_id' => 7,
                'gejala_id' => 6,
                'value_cf' => 1
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003089",
                'penyakit_id' => 7,
                'gejala_id' => 11,
                'value_cf' => 1
            ],
            [
                'id_gejala_penyakit' => "GJL-P-2003090",
                'penyakit_id' => 7,
                'gejala_id' => 19,
                'value_cf' => 1
            ]

        ];

        GejalaPenyakit::insert($data);
    }
}
