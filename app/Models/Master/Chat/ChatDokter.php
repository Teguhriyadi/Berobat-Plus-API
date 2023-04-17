<?php

namespace App\Models\Master\Chat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatDokter extends Model
{
    use HasFactory;

    protected $table = "chat_dokter";

    protected $guarded = [''];

    public $primaryKey = "id_chat_dokter";

    protected $keyType = "string";

    public $incrementing = false;
}
