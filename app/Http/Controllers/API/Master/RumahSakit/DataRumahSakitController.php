<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\RumahSakit\RS\GetRumahSakitResource;
use App\Models\Akun\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataRumahSakitController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $rs = RumahSakit::paginate(4);

            return GetRumahSakitResource::collection($rs);
        });
    }
}
