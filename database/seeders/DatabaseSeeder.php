<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Akun\CompanySeeder;
use Database\Seeders\Akun\DokterSeeder;
use Database\Seeders\Akun\KonsumenSeeder;
use Database\Seeders\Akun\OwnerApotekSeeder;
use Database\Seeders\Akun\UsersSeeder;
use Database\Seeders\Apotek\ObatSeeder;
use Database\Seeders\Apotek\ProfilApotekSeeder;
use Database\Seeders\Master\Obat\GolonganObatSeeder;
use Database\Seeders\Master\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(DokterSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(OwnerApotekSeeder::class);
        $this->call(KonsumenSeeder::class);
        $this->call(GolonganObatSeeder::class);
        $this->call(ProfilApotekSeeder::class);
        $this->call(ObatSeeder::class);
    }
}
