<?php

namespace App\Models\Master\Penyakit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisPenyakit extends Model
{
    use HasFactory;

    protected $table = "spesialis_penyakit";

    protected $guarded = [''];

    public $primaryKey = "id_penyakit";

    protected $keyType = "string";

    public $incrementing = false;
}
