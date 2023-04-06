<?php

namespace Database\Seeders\Master\Bidang;

use App\Models\Master\KeahlianDokter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeahlianDokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2001",
            "nama_keahlian" => "Dokter Bedah"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2002",
            "nama_keahlian" => "Spesialis Bedah"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2003",
            "nama_keahlian" => "Spesialis Bedah Umum"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2004",
            "nama_keahlian" => "Spesialis Bedah Saraf"
        ]);
    }
}
