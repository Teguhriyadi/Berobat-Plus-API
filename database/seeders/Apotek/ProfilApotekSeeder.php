<?php

namespace Database\Seeders\Apotek;

use App\Models\Apotek\Pengaturan\ProfilApotek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfilApotekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProfilApotek::create([
            "id_profil_apotek" => "PR-A-12345678910",
            "nama_apotek" => "Apotek Chaniago",
            "slug_apotek" => "apotek-chaniago",
            "deskripsi_apotek" => "Bandung",
            "alamat_apotek" => "Jakarta Raya",
            "nomor_hp" => "2389283923",
            "status" => 1,
            "id_user" => 8
        ]);

        ProfilApotek::create([
            "id_profil_apotek" => "PR-A-12345678911",
            "nama_apotek" => "Apotek Chaniago 2",
            "slug_apotek" => "apotek-chaniago-dua",
            "deskripsi_apotek" => "Bandung Jakarta",
            "alamat_apotek" => "Jakarta Raya",
            "nomor_hp" => "2389283924",
            "status" => 0,
            "id_user" => 8
        ]);
    }
}
