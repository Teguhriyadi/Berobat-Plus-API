<?php

namespace App\Models\Akun;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = "dokter";

    protected $guarded = [''];

    public $primaryKey = "id_dokter";

    protected $keyType = "string";

    public $incrementing = false;

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function getBiaya()
    {
        return $this->hasOne("App\Models\Master\Dokter\BiayaDokter", "id_dokter", "id_dokter");
    }
}
