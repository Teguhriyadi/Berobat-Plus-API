<?php

namespace App\Models\Artikel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupingArtikel extends Model
{
    use HasFactory;

    protected $table = "grouping_artikel";

    protected $guarded = [''];

    public $primaryKey = "id_grouping_artikel";

    protected $keyType = "string";

    public $incrementing = false;
}
