<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\RumahSakit\Spesialis\GetDokterSpesialisResource;
use App\Models\Master\RumahSakit\PraktekDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetSpesialisDokterController extends Controller
{
    public function index($id_spesialis)
    {
        return DB::transaction(function () use ($id_spesialis) {
            $dokter = PraktekDokter::where("id_spesialis", $id_spesialis)->paginate(10);

            return GetDokterSpesialisResource::collection($dokter);
        });
    }
}
