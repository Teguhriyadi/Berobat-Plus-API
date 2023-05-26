<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Akun\Perawat;
use Database\Seeders\Akun\CompanySeeder;
use Database\Seeders\Akun\DokterSeeder;
use Database\Seeders\Akun\KonsumenSeeder;
use Database\Seeders\Akun\PerawatSeeder;
use Database\Seeders\Akun\OwnerApotekSeeder;
use Database\Seeders\Akun\OwnerRumahSakitSeeder;
use Database\Seeders\Akun\RumahSakitSeeder;
use Database\Seeders\Akun\UsersSeeder;
use Database\Seeders\Apotek\Produk\DataProdukSeeder;
use Database\Seeders\Apotek\Produk\ProdukKategoriSeeder;
use Database\Seeders\Apotek\ProfilApotekSeeder;
use Database\Seeders\Master\Artikel\ContentArtikelSeeder;
use Database\Seeders\Master\Bidang\DokterKeahlianSeeder;
use Database\Seeders\Master\Bidang\KeahlianDokterSeeder;
use Database\Seeders\Master\Dokter\BiayaDokterSeeder;
use Database\Seeders\Master\GroupingArtikel\GroupingSeeder;
use Database\Seeders\Master\Kategori\KategoriArtikelSeeder;
use Database\Seeders\Master\Obat\GolonganObatSeeder;
use Database\Seeders\Master\Penyakit\DataPenyakitSeeder;
use Database\Seeders\Master\Penyakit\GejalaPenyakitSeeder;
use Database\Seeders\Master\Penyakit\GejalaSeeder;
use Database\Seeders\Master\Penyakit\SpesialisPenyakitSeeder;
use Database\Seeders\Master\Produk\KategoriProdukSeeder;
use Database\Seeders\Master\RajaOngkir\KurirSeeder;
use Database\Seeders\Master\RajaOngkir\LokasiSeeder;
use Database\Seeders\Master\RoleSeeder;
use Database\Seeders\Master\RumahSakit\DetailPraktekDokterSeeder;
use Database\Seeders\Master\RumahSakit\FasilitasRumahSakitSeeder;
use Database\Seeders\Master\RumahSakit\PraktekDokterSeeder;
use Database\Seeders\Master\RumahSakit\SpesialisRumahSakitSeeder;
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
        $this->call(KategoriArtikelSeeder::class);
        $this->call(ContentArtikelSeeder::class);
        $this->call(GroupingSeeder::class);
        $this->call(RumahSakitSeeder::class);
        $this->call(KeahlianDokterSeeder::class);
        $this->call(DetailPraktekDokterSeeder::class);
        $this->call(SpesialisRumahSakitSeeder::class);
        $this->call(PraktekDokterSeeder::class);
        $this->call(SpesialisPenyakitSeeder::class);
        $this->call(BiayaDokterSeeder::class);
        $this->call(KategoriProdukSeeder::class);
        $this->call(DataProdukSeeder::class);
        $this->call(PerawatSeeder::class);
        $this->call(ProdukKategoriSeeder::class);
        $this->call(DataPenyakitSeeder::class);
        $this->call(FasilitasRumahSakitSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(KurirSeeder::class);
        $this->call(OwnerRumahSakitSeeder::class);
        $this->call(DokterKeahlianSeeder::class);
    }
}
