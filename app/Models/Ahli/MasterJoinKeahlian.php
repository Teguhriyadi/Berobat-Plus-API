<?php

namespace App\Models\Ahli;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterJoinKeahlian extends Model
{
    use HasFactory;

    protected $table = "master_join_keahlian";
    
    protected $guarded = [''];

    public $primaryKey = "id_master_join_keahlian";

    protected $keyType = "string";

    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo("App\Models\User", "user_ahli_id", "id");
    }

    public function keahlian()
    {
        return $this->belongsTo("App\Models\Ahli\Keahlian", "keahlian_id", "id_keahlian");
    }
}
