<?php

namespace App\Models\Apotek\Pengaturan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilApotek extends Model
{
    use HasFactory;

    protected $table = "profil_apotek";

    protected $guarded = [''];

    protected $primaryKey = 'id_profil_apotek';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    public function getUser()
    {
        return $this->belongsTo("App\Models\User", "id_user", "id");
    }
}
