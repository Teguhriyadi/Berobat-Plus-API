<?php

namespace App\Models\Master\RumahSakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPraktekDokter extends Model
{
    use HasFactory;

    protected $table = "detail_praktek_dokter";

    protected $guarded = [''];

    public $primaryKey = "id_detail_praktek";

    protected $keyType = "string";

    public $incrementing = false;
}
