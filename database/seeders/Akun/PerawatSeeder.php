<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\Perawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perawat::create([
            "id_perawat" => "PWT-2005033",
            "user_id" => 14,
            "nip" => "2929929292"
        ]);

        Perawat::create([
            "id_perawat" => "PWT-2005034",
            "user_id" => 15,
            "nip" => "3333333"
        ]);

        Perawat::create([
            "id_perawat" => "PWT-2005035",
            "user_id" => 18,
            "nip" => "2328329"
        ]);

        Perawat::create([
            "id_perawat" => "PWT-2005036",
            "user_id" => 19,
            "nip" => "283923892"
        ]);
    }
}
