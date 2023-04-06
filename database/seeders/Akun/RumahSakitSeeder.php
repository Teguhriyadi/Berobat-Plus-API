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
    }
}
