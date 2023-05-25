<?php

namespace Database\Seeders\Master\Bidang;

use App\Models\Master\DokterKeahlian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003061",
            "dokter_id" => "DKTR-09022005",
            "keahlian_id" => "KHLI-2001"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003062",
            "dokter_id" => "DKTR-09022005",
            "keahlian_id" => "KHLI-2002"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003063",
            "dokter_id" => "DKTR-09022005",
            "keahlian_id" => "KHLI-2003"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003064",
            "dokter_id" => "DKTR-09022006",
            "keahlian_id" => "KHLI-2004"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003065",
            "dokter_id" => "DKTR-09022006",
            "keahlian_id" => "KHLI-2005"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003066",
            "dokter_id" => "DKTR-09022006",
            "keahlian_id" => "KHLI-2005"
        ]);

        DokterKeahlian::create([
            "id_dokter_keahlian" => "DKTR-A-2003067",
            "dokter_id" => "DKTR-09022003",
            "keahlian_id" => "KHLI-2005"
        ]);
    }
}
