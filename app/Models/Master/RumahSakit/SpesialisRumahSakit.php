<?php

namespace App\Models\Master\RumahSakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisRumahSakit extends Model
{
    use HasFactory;

    protected $table = "spesialis_rumah_sakit";

    protected $guarded = [''];

    public $primaryKey = "id_spesialis";

    protected $keyType = "string";

    public $incrementing = false;
}
