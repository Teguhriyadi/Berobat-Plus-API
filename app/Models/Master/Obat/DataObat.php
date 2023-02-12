<?php

namespace App\Models\Master\Obat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObat extends Model
{
    use HasFactory;

    protected $table = "obat";

    protected $guarded = [''];

    public $primaryKey = "id_obat";

    protected $keyType = "string";

    public $incrementing = false;

    public function getGolonganObat()
    {
        return $this->belongsTo("App\Models\Master\Obat\GolonganObat", "golongan_obat_id", "id_golongan_obat");
    }

    public function getApotek()
    {
        return $this->belongsTo("App\Models\Akun\OwnerApotek", "apotek_id", "id_owner_apotek");
    }
}
