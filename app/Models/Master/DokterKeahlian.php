<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokterKeahlian extends Model
{
    use HasFactory;

    protected $table = "dokter_keahlian";

    protected $guarded = [''];

    public $primaryKey = "id_dokter_keahlian";

    protected $keyType = "string";

    public $incrementing = false;

    public function getKeahlian()
    {
        return $this->belongsTo("App\Models\Master\KeahlianDokter", "keahlian_id", "id_keahlian");
    }

    public function getDokter()
    {
        return $this->belongsTo("App\Models\Akun\Dokter", "dokter_id", "id_dokter");
    }
}
