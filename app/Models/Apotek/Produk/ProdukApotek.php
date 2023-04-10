<?php

namespace App\Models\Apotek\Produk;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukApotek extends Model
{
    use HasFactory;

    protected $table = "produk";

    protected $guarded = [''];

    public $primaryKey = "id_produk";

    protected $keyType = "string";

    public $incrementing = false;
}
