<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\RumahSakit\Spesialis\GetSpesialisResource;
use App\Models\Master\RumahSakit\SpesialisRumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpesialisRumahSakitController extends Controller
{
    public function index($id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_rumah_sakit) {
            $spesialis = SpesialisRumahSakit::with("getSpesialisPenyakit:id_penyakit,nama_spesialis,slug_spesialis")->where("id_rumah_sakit", $id_rumah_sakit)->paginate(10);


            return GetSpesialisResource::collection($spesialis);
        });
    }
}
