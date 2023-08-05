<?php

namespace App\Models\Midtrans;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = "invoice_message";

    protected $guarded = [''];
}
