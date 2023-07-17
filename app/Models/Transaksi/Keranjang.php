<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";

    protected $guarded = [''];

    public $primaryKey = "id_keranjang";

    protected $keyType = "string";

    public $incrementing = false;
}
