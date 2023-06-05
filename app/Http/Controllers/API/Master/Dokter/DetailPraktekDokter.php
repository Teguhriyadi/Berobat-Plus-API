<?php

namespace App\Http\Controllers\API\Master\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Dokter\GetDetailPraktekResource;
use App\Models\Akun\Dokter;
use App\Models\Master\RumahSakit\DetailPraktekDokter as RumahSakitDetailPraktekDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailPraktekDokter extends Controller
{
    public function index()
    {
        return DB::transaction(function () {

            $dokter = Dokter::where("user_id", Auth::user()->id)->first();

            $praktek = RumahSakitDetailPraktekDokter::where("id_dokter", $dokter["id_dokter"])->get();
            
            return GetDetailPraktekResource::collection($praktek);
            // $detail = DetailPraktekDokter::where("")
        });
    }
}
