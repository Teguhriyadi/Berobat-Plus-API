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
            "longtitude" => "108.2825259",
            "latitude" => "-6.4079173",
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
            "longtitude" => "108.28035",
            "latitude" => "-6.401698",
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

        User::create([
            "nama" => "Abdul Rahman",
            "email" => "abdul123@gmail.com",
            "password" => bcrypt("password"),
            "nomor_hp" => "085324237267812",
            "alamat" => "Bandung",
            "id_role" => "RO-2003062",
            "status" => 1
        ]);

        User::create([
            "nama" => "Lapu - Lapu",
            "email" => "rs.lapu@gmail.com",
            "password" => bcrypt("rumahsakit"),
            "nomor_hp" => "1234567891011",
            "alamat" => "Cirebon",
            "id_role" => "RO-2003066",
            "status" => 1
        ]);

        User::create([
            "nama" => "Sumber Kasih",
            "email" => "rs.sumber_kasih@gmail.com",
            "password" => bcrypt("rumahsakit"),
            "nomor_hp" => "121212",
            "alamat" => "Cirebon",
            "id_role" => "RO-2003066",
            "status" => 1
        ]);

        User::create([
            "nama" => "Tangkil",
            "email" => "rs.tangkil@gmail.com",
            "password" => bcrypt("rumahsakit"),
            "nomor_hp" => "454545",
            "alamat" => "Cirebon",
            "id_role" => "RO-2003066",
            "status" => 1
        ]);

        User::create([
            "nama" => "Ciremai",
            "email" => "rs.ciremai@gmail.com",
            "password" => bcrypt("rumahsakit"),
            "nomor_hp" => "909090",
            "alamat" => "Cirebon",
            "id_role" => "RO-2003066",
            "status" => 1
        ]);
    }
}
