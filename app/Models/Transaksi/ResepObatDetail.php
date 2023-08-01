<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObatDetail extends Model
{
    use HasFactory;

    protected $table = "resep_obat_detail";

    protected $guarded = [''];

    public $primaryKey = "id_resep_obat_detail";

    protected $keyType = "string";

    public $incrementing = false;

    public function produk()
    {
        return $this->belongsTo("App\Models\Apotek\Produk\ProdukApotek", "produk_id", "id_produk");
    }

    public function resep_obat()
    {
        return $this->belongsTo("App\Models\Transaksi\ResepObat", "id_resep_obat", "id_resep_obat");
    }
}
