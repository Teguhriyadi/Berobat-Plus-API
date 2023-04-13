<?php

namespace App\Models\Master\Penyakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GejalaPenyakit extends Model
{
    use HasFactory;

    protected $table = "gejala_penyakit";

    protected $guarded = [''];

    public $primaryKey = "id_gejala_penyakit";

    protected $keyType = "string";

    public $incrementing = false;
}
