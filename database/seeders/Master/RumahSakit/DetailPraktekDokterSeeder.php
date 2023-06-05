<?php

namespace Database\Seeders\Master\RumahSakit;

use App\Models\Master\RumahSakit\DetailPraktekDokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPraktekDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DetailPraktekDokter::create([
            "id_detail_praktek" => "DKT-P-2001",
            "id_dokter" => "DKTR-09022002",
            "id_rumah_sakit" => "RS-123456789",
            "biaya_dokter" => "20000"
        ]);

        DetailPraktekDokter::create([
            "id_detail_praktek" => "DKT-P-2002",
            "id_dokter" => "DKTR-09022002",
            "id_rumah_sakit" => "RS-123456790",
            "biaya_dokter" => "30000"
        ]);
    }
}
