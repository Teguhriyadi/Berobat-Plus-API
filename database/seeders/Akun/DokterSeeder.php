<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\Dokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dokter::create([
            "id_dokter" => "DKTR-09022002",
            "user_id" => 3,
            "jabatan" => "Dokter Umum",
            "pendidikan_terakhir" => "Universitas Siliwangi",
            "praktik_di" => "RS. Sumber Kasih",
            "nomor_str" => "3212121211212121"
        ]);

        Dokter::create([
            "id_dokter" => "DKTR-09022003",
            "user_id" => 4,
            "jabatan" => "Dokter Umum",
            "pendidikan_terakhir" => "Universitas Tasikmalaya",
            "praktik_di" => "RS. Sumber Kasih",
            "nomor_str" => "3212121211212121"
        ]);

        Dokter::create([
            "id_dokter" => "DKTR-09022004",
            "user_id" => 5,
            "jabatan" => "Dokter Umum",
            "pendidikan_terakhir" => "Universitas Indonesia",
            "praktik_di" => "RS. Sumber Kasih",
            "nomor_str" => "3212121211212121"
        ]);
    }
}
