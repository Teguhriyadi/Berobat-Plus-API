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
            "nama_keahlian" => "Gangguan Kecemasan",
            "id_spesialis_penyakit" => "SPS-001"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2002",
            "nama_keahlian" => "Stres",
            "id_spesialis_penyakit" => "SPS-001"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2003",
            "nama_keahlian" => "Depresi",
            "id_spesialis_penyakit" => "SPS-001"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2004",
            "nama_keahlian" => "Keluarga & Hubungan",
            "id_spesialis_penyakit" => "SPS-002"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2005",
            "nama_keahlian" => "Trauma",
            "id_spesialis_penyakit" => "SPS-002"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2006",
            "nama_keahlian" => "Gangguan Mood",
            "id_spesialis_penyakit" => "SPS-002"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2007",
            "nama_keahlian" => "Kecanduan",
            "id_spesialis_penyakit" => "SPS-003"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2008",
            "nama_keahlian" => "Identitas Seksual",
            "id_spesialis_penyakit" => "SPS-003"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2009",
            "nama_keahlian" => "Gangguan Kepribadian",
            "id_spesialis_penyakit" => "SPS-004"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2010",
            "nama_keahlian" => "Pengembangan Diri",
            "id_spesialis_penyakit" => "SPS-004"
        ]);
    }
}
