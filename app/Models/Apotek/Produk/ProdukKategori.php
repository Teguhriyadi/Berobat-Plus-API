<?php

namespace App\Models\Apotek\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKategori extends Model
{
    use HasFactory;

    protected $table = "produk_kategori";

    protected $guarded = [''];

    public $primaryKey = "id_produk_kategori";

    protected $keyType = "string";

    public $incrementing = false;
}
