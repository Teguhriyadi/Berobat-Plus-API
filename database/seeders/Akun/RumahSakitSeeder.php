<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\RumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RumahSakit::create([
            "id_rumah_sakit" => "RS-123456789",
            "id_user" => 11,
            "nama_rs" => "RS. Plumbon",
            "slug_rs" => "rs-plumbon",
            "deskripsi_rs" => "lorem ipsum dolor sit amet",
            "kategori_rs" => 1,
            "alamat_rs" => "Indonesia"
        ]);

        RumahSakit::create([
            "id_rumah_sakit" => "RS-123456790",
            "id_user" => 12,
            "nama_rs" => "RS. Sumber Kasih",
            "slug_rs" => "rs-sumber-kasih",
            "deskripsi_rs" => "lorem ipsum dolor sit amet",
            "kategori_rs" => 1,
            "alamat_rs" => "Indonesia"
        ]);

        RumahSakit::create([
            "id_rumah_sakit" => "RS-123456791",
            "id_user" => 13,
            "nama_rs" => "RS. Tangkil",
            "slug_rs" => "rs-tangkil",
            "deskripsi_rs" => "lorem ipsum dolor sit amet",
            "kategori_rs" => 1,
            "alamat_rs" => "Indonesia"
        ]);

        RumahSakit::create([
            "id_rumah_sakit" => "RS-123456792",
            "id_user" => 14,
            "nama_rs" => "RS. Ciremai",
            "slug_rs" => "rs-ciremai",
            "deskripsi_rs" => "lorem ipsum dolor sit amet",
            "kategori_rs" => 1,
            "alamat_rs" => "Indonesia"
        ]);
    }
}
