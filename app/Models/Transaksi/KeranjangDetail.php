<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangDetail extends Model
{
    use HasFactory;

    protected $table = "keranjang_detail";

    protected $guarded = [''];

    public $primaryKey = "id_keranjang_detail";

    protected $keyType = "string";

    public $incrementing = false;
}
