<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\OwnerApotek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerApotekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OwnerApotek::create([
            "id_owner_apotek" => "OWN-312456789",
            "user_id" => 5,
            "nama_apotek" => "Apotek RS. Makanan"
        ]);

        OwnerApotek::create([
            "id_owner_apotek" => "OWN-312456790",
            "user_id" => 5,
            "nama_apotek" => "Apotek RS. Minuman"
        ]);
    }
}