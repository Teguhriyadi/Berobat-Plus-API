<?php

namespace Database\Seeders\Master\Penyakit;

use App\Models\Master\Penyakit\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama' => 'Demam',
                'kode_gejala' => 'G001'
            ],
            [
                'nama' => 'Demam tinggi',
                'kode_gejala' => 'G002'
            ],
            [
                'nama' => 'Batuk',
                'kode_gejala' => 'G003'
            ],
            [
                'nama' => 'Diare',
                'kode_gejala' => 'G004'
            ],
            [
                'nama' => 'Mual',
                'kode_gejala' => 'G005'
            ],
            [
                'nama' => 'Muntah',
                'kode_gejala' => 'G006'
            ],
            [
                'nama' => 'Nyeri otot',
                'kode_gejala' => 'G007'
            ],
            [
                'nama' => 'Sakit perut',
                'kode_gejala' => 'G008'
            ],
            [
                'nama' => 'Kram otot',
                'kode_gejala' => 'G009'
            ],
            [
                'nama' => 'Pilek',
                'kode_gejala' => 'G010'
            ],
            [
                'nama' => 'Muntah',
                'kode_gejala' => 'G011'
            ],
            [
                'nama' => 'Tubuh menggigil',
                'kode_gejala' => 'G012'
            ],
            [
                'nama' => 'Tubuh nyeri',
                'kode_gejala' => 'G013'
            ],
            [
                'nama' => 'Penyakit kuning',
                'kode_gejala' => 'G014'
            ],
            [
                'nama' => 'Nyeri sendi',
                'kode_gejala' => 'G015'
            ],
            [
                'nama' => 'Nyeri perut',
                'kode_gejala' => 'G016'
            ],
            [
                'nama' => 'Trombosit turun',
                'kode_gejala' => 'G017'
            ],
            [
                'nama' => 'Muncul bintik merah',
                'kode_gejala' => 'G018'
            ],
            [
                'nama' => 'Gatal',
                'kode_gejala' => 'G019'
            ],
            [
                'nama' => 'Sakit di persendian',
                'kode_gejala' => 'G020'
            ],
            [
                'nama' => 'Sakit kepala',
                'kode_gejala' => 'G021'
            ]
        ];

        Gejala::insert($data);
    }
}
