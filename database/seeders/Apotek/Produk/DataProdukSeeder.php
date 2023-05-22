<?php

namespace Database\Seeders\Apotek\Produk;

use App\Models\Apotek\Produk\ProdukApotek;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProdukApotek::create([
            "kode_produk" => "PRO-2003061",
            "id_owner_apotek" => "OWN-293293289",
            "id_profil_apotek" => "PR-A-12345678910",
            "nama_produk" => "Paramex",
            "slug_produk" => "paramex",
            "deskripsi_produk" => "Obat Termahal",
            "harga_produk" => 50000
        ]);

        ProdukApotek::create([
            "kode_produk" => "PRO-2003062",
            "id_owner_apotek" => "OWN-293293289",
            "id_profil_apotek" => "PR-A-12345678910",
            "nama_produk" => "Bodrex",
            "slug_produk" => "bodrex",
            "deskripsi_produk" => "Obat Termahal",
            "harga_produk" => 30000
        ]);

        ProdukApotek::create([
            "kode_produk" => "PRO-2003063",
            "id_owner_apotek" => "OWN-293293289",
            "id_profil_apotek" => "PR-A-12345678910",
            "nama_produk" => "Maag",
            "slug_produk" => "maag",
            "deskripsi_produk" => "Obat Termahal",
            "harga_produk" => 20000
        ]);

        ProdukApotek::create([
            "kode_produk" => "PRO-2003064",
            "id_owner_apotek" => "OWN-293293289",
            "id_profil_apotek" => "PR-A-12345678910",
            "nama_produk" => "Paracetamol",
            "slug_produk" => "paracetamol",
            "deskripsi_produk" => "Obat Termahal",
            "harga_produk" => 10000
        ]);
    }
}
