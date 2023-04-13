<?php

namespace App\Models\Master\Penyakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    protected $table = "gejala";

    protected $guarded = [''];

    public $primaryKey = "kode_gejala";

    protected $keyType = "string";

    public $incrementing = false;
}
