<?php

namespace Database\Seeders\Master\Bidang;

use App\Models\Master\KeahlianPerawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerawatKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeahlianPerawat::create([
            "id_perawat_keahlian" => "KHL-P-2003061",
            "id_perawat" => "PWT-2005033",
            "keahlian_id" => "KHLI-2001"
        ]);

        KeahlianPerawat::create([
            "id_perawat_keahlian" => "KHL-P-2003062",
            "id_perawat" => "PWT-2005033",
            "keahlian_id" => "KHLI-2002"
        ]);

        KeahlianPerawat::create([
            "id_perawat_keahlian" => "KHL-P-2003063",
            "id_perawat" => "PWT-2005034",
            "keahlian_id" => "KHLI-2003"
        ]);

        KeahlianPerawat::create([
            "id_perawat_keahlian" => "KHL-P-2003064",
            "id_perawat" => "PWT-2005034",
            "keahlian_id" => "KHLI-2004"
        ]);
    }
}
