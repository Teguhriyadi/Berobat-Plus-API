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
            "nama_keahlian" => "Gangguan Kecemasan"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2002",
            "nama_keahlian" => "Stres"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2003",
            "nama_keahlian" => "Depresi"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2004",
            "nama_keahlian" => "Keluarga & Hubungan"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2005",
            "nama_keahlian" => "Trauma"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2006",
            "nama_keahlian" => "Gangguan Mood"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2007",
            "nama_keahlian" => "Kecanduan"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2008",
            "nama_keahlian" => "Identitas Seksual"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2009",
            "nama_keahlian" => "Gangguan Kepribadian"
        ]);

        KeahlianDokter::create([
            "id_keahlian" => "KHLI-2010",
            "nama_keahlian" => "Pengembangan Diri"
        ]);
    }
}
