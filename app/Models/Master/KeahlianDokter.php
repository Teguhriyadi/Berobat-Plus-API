<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianDokter extends Model
{
    use HasFactory;

    protected $table = "keahlian";

    protected $guarded = [''];

    public $primaryKey = "id_keahlian";

    protected $keyType = "string";

    public $incrementing = false;
}
