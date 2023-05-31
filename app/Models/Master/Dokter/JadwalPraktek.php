<?php

namespace App\Models\Master\Dokter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktek extends Model
{
    use HasFactory;

    protected $table = "jadwal_praktek_dokter";

    protected $guarded = [''];

    public $primaryKey = "id_jadwal_praktek_dokter";

    protected $keyType = "string";

    public $incrementing = false;

    public $timestamps = false;
}
