<?php

namespace Database\Seeders\Apotek;

use App\Models\Master\Obat\DataObat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataObat::create([
            "id_obat" => "OBT-2812819821",
            "nama_obat" => "Paramex",
            "harga" => 50000,
            "deskripsi" => "Barang Paramex",
            "apotek_id" => "PR-A-12345678910",
            "golongan_obat_id" => "GOL-O-123455"
        ]);

        DataObat::create([
            "id_obat" => "OBT-2812819822",
            "nama_obat" => "Bodrexin",
            "harga" => 60000,
            "deskripsi" => "Barang Bodrexin",
            "apotek_id" => "PR-A-12345678911",
            "golongan_obat_id" => "GOL-O-123456"
        ]);
    }
}
