<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\Akun\CompanySeeder;
use Database\Seeders\Akun\DokterSeeder;
use Database\Seeders\Akun\UsersSeeder;
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
        $this->call(CompanySeeder::class);
        $this->call(DokterSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
