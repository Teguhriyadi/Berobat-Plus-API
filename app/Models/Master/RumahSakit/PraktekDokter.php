<?php

namespace App\Models\Master\RumahSakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PraktekDokter extends Model
{
    use HasFactory;

    protected $table = "praktek_dokter";

    protected $guarded = [''];

    public $primaryKey = "id_praktek";

    protected $keyType = "string";

    public $incrementing = false;
}
