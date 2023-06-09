<?php

namespace Database\Seeders\Master\CekResi;

use App\Models\Master\CekResi\CekResi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CekResiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CekResi::create([
            "id_resi" => "R-1",
            "nama_jasa_pengiriman" => "jne"
        ]);
        CekResi::create([
            "id_resi" => "R-2",
            "nama_jasa_pengiriman" => "jnt"
        ]);
        CekResi::create([
            "id_resi" => "R-3",
            "nama_jasa_pengiriman" => "sicepat"
        ]);
        CekResi::create([
            "id_resi" => "R-4",
            "nama_jasa_pengiriman" => "anteraja"
        ]);
    }
}
