<?php

namespace App\Models\Master\Obat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GolonganObat extends Model
{
    use HasFactory;

    protected $table = "golongan_obat";

    protected $guarded = [''];

    public $primaryKey = "id_golongan_obat";

    protected $keyType = "string";

    public $incrementing = false;
}
