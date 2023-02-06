<?php

namespace Database\Seeders\Akun;

use App\Models\Akun\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            "id_company" => "CMP-194503",
            "nama_company" => "RS. Sumber Kasih",
            "user_id" => 2,
            "lokasi_company" => "Cirebon"
        ]);

        Company::create([
            "id_company" => "CMP-194504",
            "nama_company" => "RS. Plumbon",
            "user_id" => 6,
            "lokasi_company" => "Bandung"
        ]);
    }
}
