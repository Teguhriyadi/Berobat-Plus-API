<?php

namespace App\Http\Controllers\API\Master\Perawat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Keahlian\GetKeahlianPerawatResource;
use App\Http\Resources\Master\Keahlian\GetKeahlianResource;
use App\Models\Master\KeahlianPerawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeahlianPerawatController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $keahlian = KeahlianPerawat::with("perawat:id_perawat,nip")->with("keahlian:id_keahlian,nama_keahlian")->get();

            return GetKeahlianPerawatResource::collection($keahlian);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use($request) {
            KeahlianPerawat::create([
                "id_perawat_keahlian" => "KHL-P-" . date("YmdHis"),
                "id_perawat" => $request->id_perawat,
                "keahlian_id" => $request->keahlian_id
            ]);

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]); 
        });
    }

    public function edit($id_perawat_keahlian)
    {
        return DB::transaction(function() use($id_perawat_keahlian) {
            $keahlian = KeahlianPerawat::where("id_perawat_keahlian", $id_perawat_keahlian)->first();

            return new GetKeahlianResource($keahlian);
        });
    }
}
