<?php

namespace App\Models\Akun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnerApotek extends Model
{
    use HasFactory;

    protected $table = "owner_apotek";

    protected $guarded = [''];

    public $primaryKey = "id_owner_apotek";

    protected $keyType = "string";

    public $incrementing = false;
}
