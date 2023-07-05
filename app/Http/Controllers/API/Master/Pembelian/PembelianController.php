<?php

namespace App\Http\Controllers\API\Master\Pembelian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function store(Request $request)
    {
        return DB::transaction(function() {
            echo "Ada";
        });
    }
}
