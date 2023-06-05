<?php

namespace App\Models\Master\Dokter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalAntrian extends Model
{
    use HasFactory;

    protected $table = "jadwal_antrian";

    protected $guarded = [''];

    public $primaryKey = "id_jadwal_antrian";

    protected $keyType = "string";

    public $incrementing = false;

    public $timestamps = false;
}
