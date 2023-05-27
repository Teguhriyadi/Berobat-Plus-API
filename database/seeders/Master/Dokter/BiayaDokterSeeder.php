<?php

namespace Database\Seeders\Master\Dokter;

use App\Models\Master\Dokter\BiayaDokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiayaDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BiayaDokter::create([
            "id_biaya_dokter" => "BIA-D-001",
            "id_dokter" => "DKTR-09022002",
            "biaya" => 20000
        ]);

        BiayaDokter::create([
            "id_biaya_dokter" => "BIA-D-002",
            "id_dokter" => "DKTR-09022003",
            "biaya" => 30000
        ]);

        BiayaDokter::create([
            "id_biaya_dokter" => "BIA-D-003",
            "id_dokter" => "DKTR-09022004",
            "biaya" => 40000
        ]);

        BiayaDokter::create([
            "id_biaya_dokter" => "BIA-D-004",
            "id_dokter" => "DKTR-09022005",
            "biaya" => 40000
        ]);

        BiayaDokter::create([
            "id_biaya_dokter" => "BIA-D-005",
            "id_dokter" => "DKTR-09022006",
            "biaya" => 40000
        ]);
    }
}
