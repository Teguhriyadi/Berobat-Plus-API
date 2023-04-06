<?php

namespace Database\Seeders\Master\RumahSakit;

use App\Models\Master\RumahSakit\SpesialisRumahSakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpesialisRumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-001",
            "id_rumah_sakit" => "RS-123456789",
            "nama_spesialis" => "Dentist",
            "slug_spesialis" => "dentist"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-002",
            "id_rumah_sakit" => "RS-123456789",
            "nama_spesialis" => "Neurologist",
            "slug_spesialis" => "neurologist"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-003",
            "id_rumah_sakit" => "RS-123456789",
            "nama_spesialis" => "Internist",
            "slug_spesialis" => "internist"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-004",
            "id_rumah_sakit" => "RS-123456789",
            "nama_spesialis" => "Pediatrician",
            "slug_spesialis" => "pediatrician"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-005",
            "id_rumah_sakit" => "RS-123456789",
            "nama_spesialis" => "Obstetrics",
            "slug_spesialis" => "obstetrics"
        ]);


        // Rumah Sakit Kedua

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-006",
            "id_rumah_sakit" => "RS-123456790",
            "nama_spesialis" => "Dentist 2",
            "slug_spesialis" => "dentist-dua"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-007",
            "id_rumah_sakit" => "RS-123456790",
            "nama_spesialis" => "Neurologist 2",
            "slug_spesialis" => "neurologist-dua"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-008",
            "id_rumah_sakit" => "RS-123456790",
            "nama_spesialis" => "Internist 2",
            "slug_spesialis" => "internist-dua"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-009",
            "id_rumah_sakit" => "RS-123456790",
            "nama_spesialis" => "Pediatrician 2",
            "slug_spesialis" => "pediatrician-dua"
        ]);

        SpesialisRumahSakit::create([
            "id_spesialis" => "SPS-010",
            "id_rumah_sakit" => "RS-123456790",
            "nama_spesialis" => "Obstetrics 2",
            "slug_spesialis" => "obstetrics-dua"
        ]);
    }
}
