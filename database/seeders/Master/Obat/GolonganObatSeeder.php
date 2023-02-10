<?php

namespace Database\Seeders\Master\Obat;

use App\Models\Master\Obat\GolonganObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GolonganObat::create([
            "id_golongan_obat" => "GOL-O-123455",
            "golongan_obat" => "Alat Kesehatan"
        ]);

        GolonganObat::create([
            "id_golongan_obat" => "GOL-O-123456",
            "golongan_obat" => "Alat Bantu Manusia"
        ]);
    }
}
