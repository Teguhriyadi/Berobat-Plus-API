<?php

namespace App\Models\Master\Penyakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPenyakit extends Model
{
    use HasFactory;

    protected $table = "penyakit";

    protected $guarded = [''];

    public $primaryKey = "kode_penyakit";

    protected $keyType = "string";

    public $incrementing = false;
}
