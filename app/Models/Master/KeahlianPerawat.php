<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeahlianPerawat extends Model
{
    use HasFactory;

    protected $table = "perawat_keahlian";

    protected $guarded = [''];
}
