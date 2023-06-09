<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianPerawat extends Model
{
    use HasFactory;

    protected $table = "perawat_keahlian";

    protected $guarded = [''];

    public function perawat()
    {
        return $this->belongsTo("App\Models\Akun\Perawat", "id_perawat", "id_perawat");
    }

    public function keahlian()
    {
        return $this->belongsTo("App\Models\Master\KeahlianDokter", "keahlian_id", "id_keahlian");
    }
}
