<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ahli\ResepObat\GetDetailResepObatResource;
use App\Models\Transaksi\ResepObat;
use App\Models\Transaksi\ResepObatDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResepObatDetailController extends Controller
{
    public function show($id_konsumen)
    {
        try {
            $resep_obat = ResepObat::where("ahli_id", Auth::user()->id)
                ->where("konsumen_id", $id_konsumen)
                ->first();
            
            if (!$resep_obat) {
                return response()->json(["status" => false, "message" => "Resep Obat Tidak Ditemukan"]);
            }

            $data = ResepObatDetail::where("id_resep_obat", $resep_obat->id_resep_obat)->get();
            
            return GetDetailResepObatResource::collection($data);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
