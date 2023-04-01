<?php

namespace Database\Seeders\Master\Artikel;

use App\Models\Artikel\DataArtikel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DataArtikel::create([
            "id_artikel" => "ART-12345678",
            "judul_artikel" => "Cara Hidup Sehat",
            "slug_artikel" => "cara-hidup-sehat",
            "deskripsi" => "Wabah Covid-19 yang melanda di dunia memang menyebabkan kekhawatiran bagi semua orang. Namun, sebenarnya Anda tak perlu khawatir berlebihan jika Anda termasuk orang yang telaten menjaga kesehatan. Pola hidup sehat yang dijalani secara konsisten dapat membantu menangkal Covid-19. Tak ada kata terlambat untuk memulai pola hidup sehat. Mari menerapkan beberapa kebiasaan sehat ini bersama keluarga agar terhindar dari Covid-19 dan penyakit lainnya:",
            "user_id" => 2
        ]);

        DataArtikel::create([
            "id_artikel" => "ART-12345679",
            "judul_artikel" => "Cara Hidup Bahagia",
            "slug_artikel" => "cara-hidup-bahagia",
            "deskripsi" => "Hidup bahagia dapat dipastikan menjadi impian dan tujuan dari semua manusia. Hidup di dunia dengan segala tantangan dan rintangan yang ada didalamnya sering membuat kita menjadi tidak bahagia. Ditengah ramainya kehidupan dengan berbagai tanggung jawab, beban, hingga tekanan sering menjadikan kita menjadi mudah gelisah dan sedih. Tuntutan hidup di dunia sering kali memberikan efek negatif kepada kehidupan manusia.
            Namun, beberapa masalah atau tuntutan ini sebenrnya bisa dilepaskan. Oleh karena itu, manusia perlu memiliki kemampuan untuk bisa mengolah perasaan, pikiran untuk senantiasa bahagia dalam berbagai tekanan. Nah, kali ini, saya akan membagikan tips atau cara untuk hidup bahagia, yang bisa kita lakukan supaya pikiran menjadi waras dan otak menjadi sehat, di antaranya yaitu:",
            "user_id" => 2
        ]);

        DataArtikel::create([
            "id_artikel" => "ART-12345680",
            "judul_artikel" => "Menghapal Dengan Cepat",
            "slug_artikel" => "menghapal-dengan-cepat",
            "deskripsi" => "Menghafal dengan cepat adalah kemampuan yang dibutuhkan oleh setiap orang. Hal ini penting guna meningkatkan produktivitas. Bagi pelajar, bisa menghafal dengan cepat membantu mereka untuk bisa memahami pelajaran dengan optimal. Sedangkan bagi mereka yang sudah bekerja, kemampuan ini dapat memaksimalkan performa di kantor.
            Apakah Anda memiliki kesulitan dalam menghafal? Tips atau cara menghafal dengan cepat berikut ini mungkin akan berguna.",
            "user_id" => 2
        ]);
    }
}
