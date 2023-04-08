<?php

namespace Database\Seeders\Master\Penyakit;

use App\Models\Master\Penyakit\SpesialisPenyakit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpesialisPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-001",
            "nama_spesialis" => "Dentist",
            "slug_spesialis" => "dentist"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-002",
            "nama_spesialis" => "Panadol",
            "slug_spesialis" => "panadol"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-003",
            "nama_spesialis" => "Bodrex",
            "slug_spesialis" => "bodrex"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-004",
            "nama_spesialis" => "Paramex",
            "slug_spesialis" => "paramex"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-005",
            "nama_spesialis" => "Badan",
            "slug_spesialis" => "badan"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-006",
            "nama_spesialis" => "Kulit",
            "slug_spesialis" => "kulit"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-007",
            "nama_spesialis" => "Mata",
            "slug_spesialis" => "mata"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-008",
            "nama_spesialis" => "Neurologist",
            "slug_spesialis" => "neurologist"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-009",
            "nama_spesialis" => "Internist",
            "slug_spesialis" => "internist"
        ]);

        SpesialisPenyakit::create([
            "id_penyakit" => "SPS-010",
            "nama_spesialis" => "Obstetrics",
            "slug_spesialis" => "obstetics"
        ]);
    }
}
