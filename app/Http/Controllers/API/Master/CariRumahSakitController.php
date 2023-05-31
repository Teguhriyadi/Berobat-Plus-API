<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Akun\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CariRumahSakitController extends Controller
{
    public function index(Request $request)
    {
        return DB::transaction(function() use($request) {
            $rumah_sakit = RumahSakit::where("nama_rs", "LIKE", "%" . $request->search . "%")->get();

            return response()->json($rumah_sakit);
        });
    }
}
