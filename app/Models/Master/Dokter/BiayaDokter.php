<?php

namespace App\Models\Master\Dokter;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaDokter extends Model
{
    use HasFactory;

    protected $table = "biaya_dokter";

    protected $guarded = [''];

    public $primaryKey = "id_biaya_dokter";

    protected $keyType = "string";

    public $incrementing = false;
}
