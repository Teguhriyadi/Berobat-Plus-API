<?php

namespace Database\Seeders\Akun;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "nama" => "Ahmad Fauzi",
            "email" => "ahmad_fauzi@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237299",
            "alamat" => "Bandung",
            "id_role" => "RO-2003061",
            "jenis_kelamin" => "L",
            "usia" => "21",
            "berat_badan" => "50",
            "tinggi_badan" => "21",
            "tempat_lahir" => "Jakarta",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Dahlan",
            "email" => "ahmad_dahlan@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237292",
            "alamat" => "Jakarta",
            "id_role" => "RO-2003062",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "created_by" => 1,
            "berat_badan" => "40",
            "tinggi_badan" => "22",
            "tempat_lahir" => "Jakarta",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Heryawan",
            "email" => "ahmad_heryawan@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237291",
            "alamat" => "Cirebon",
            "id_role" => "RO-2003063",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "created_by" => 2,
            "berat_badan" => "40",
            "tinggi_badan" => "22",
            "tempat_lahir" => "Jakarta",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Rizki Pratama",
            "email" => "ahmad_rizki_pratama@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237225",
            "alamat" => "Solo",
            "id_role" => "RO-2003063",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "created_by" => 2,
            "berat_badan" => "40.5",
            "tinggi_badan" => "161.5",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Rizki Rapli",
            "email" => "ahmad_rizki_rapli@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237228",
            "alamat" => "Amerika",
            "id_role" => "RO-2003063",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "berat_badan" => "40.5",
            "tinggi_badan" => "161.5",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Ilham",
            "email" => "ahmad_ilham@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237266",
            "alamat" => "Banyuwangi",
            "id_role" => "RO-2003062",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "created_by" => 1,
            "berat_badan" => "40.5",
            "tinggi_badan" => "161.5",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Ahmad Bajuri",
            "email" => "ahmad_bajuri@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "0853242372671",
            "alamat" => "Palembang",
            "id_role" => "RO-2003064",
            "jenis_kelamin" => "L",
            "usia" => "20",
            "berat_badan" => "40.5",
            "tinggi_badan" => "161.5",
            "tempat_lahir" => "Bandung",
            "tanggal_lahir" => "2023-02-02",
            "status" => "1"
        ]);

        User::create([
            "nama" => "Mohammad Prasetya",
            "email" => "prasetya@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "08532423726759",
            "alamat" => "Brazil",
            "id_role" => "RO-2003065",
            "created_by" => 1,
            "status" => 1
        ]);

        User::create([
            "nama" => "Mohammad Septian",
            "email" => "septian@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "08532423726780",
            "alamat" => "Konghucu",
            "id_role" => "RO-2003065",
            "status" => 1
        ]);
    }
}
