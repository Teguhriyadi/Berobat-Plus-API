<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\DokterKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariKeahlianController extends Controller
{
    public function index(Request $request)
    {
        return DB::transaction(function()  use($request) {
            $results = DB::table("dokter_keahlian")
                ->join("keahlian", "dokter_keahlian.keahlian_id", "=", "keahlian.id_keahlian")
                ->where("keahlian.nama_keahlian", "LIKE", "%".$request->search."%")
                ->get();

            return response()->json($results);
        });
    }
}
