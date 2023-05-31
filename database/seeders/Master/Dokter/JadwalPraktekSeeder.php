<?php

namespace Database\Seeders\Master\Dokter;

use App\Models\Master\Dokter\JadwalPraktek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JadwalPraktekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JadwalPraktek::create([
            "id_jadwal_praktek_dokter" => "JDWL-P-2003061",
            "id_detail_praktek" => "DKTP-P-2001",
            "hari" => "Minggu",
            "mulai_jam" => "07:00",
            "selesai_jam" => "09:00"
        ]);

        JadwalPraktek::create([
            "id_jadwal_praktek_dokter" => "JDWL-P-2003062",
            "id_detail_praktek" => "DKTP-P-2001",
            "hari" => "Senin",
            "mulai_jam" => "07:00",
            "selesai_jam" => "09:00"
        ]);

        JadwalPraktek::create([
            "id_jadwal_praktek_dokter" => "JDWL-P-2003063",
            "id_detail_praktek" => "DKTP-P-2001",
            "hari" => "Selasa",
            "mulai_jam" => "08:00",
            "selesai_jam" => "10:00"
        ]);

        JadwalPraktek::create([
            "id_jadwal_praktek_dokter" => "JDWL-P-2003064",
            "id_detail_praktek" => "DKTP-P-2002",
            "hari" => "Rabu",
            "mulai_jam" => "10:00",
            "selesai_jam" => "11:00"
        ]);

        JadwalPraktek::create([
            "id_jadwal_praktek_dokter" => "JDWL-P-2003065",
            "id_detail_praktek" => "DKTP-P-2002",
            "hari" => "Sabtu",
            "mulai_jam" => "12:00",
            "selesai_jam" => "13:00"
        ]);
    }
}
