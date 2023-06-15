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

    public function getDokter()
    {
        return $this->belongsTo("App\Models\Akun\Dokter", "id_dokter", "id_dokter");
    }

    public function getKeahlian()
    {
        return $this->belongsTo("App\Models\Ahli\Keahlian", "id_keahlian", "id_keahlian");
    }
}
