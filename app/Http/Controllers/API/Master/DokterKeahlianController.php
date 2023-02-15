<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Keahlian\GetDokterKeahlianResource;
use App\Models\Master\DokterKeahlian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterKeahlianController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $dokter_keahlian = DokterKeahlian::orderBy("created_at", "DESC")->with("getKeahlian:id_keahlian,nama_keahlian")->paginate(10);

            return GetDokterKeahlianResource::collection($dokter_keahlian);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            DokterKeahlian::create([
                "id_dokter_keahlian" => "KHL-" . date("YmdHis"),
                "dokter_id" => $request->dokter_id,
                "keahlian_id" => $request->keahlian_id
            ]);

            return response()->json(["pesan" => "Data Dokter Keahlian Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_dokter_keahlian)
    {
        return DB::transaction(function () use ($id_dokter_keahlian) {
            $dokter_keahlian = DokterKeahlian::where("id_dokter_keahlian", $id_dokter_keahlian)->first();

            return new GetDokterKeahlianResource($dokter_keahlian);
        });
    }

    public function update(Request $request, $id_dokter_keahlian)
    {
        return DB::transaction(function () use ($request, $id_dokter_keahlian) {
            DokterKeahlian::where("id_dokter_keahlian", $id_dokter_keahlian)->update([
                "dokter_id" => $request->dokter_id,
                "keahlian_id" => $request->keahlian_id
            ]);

            return response()->json(["pesan" => "Data Dokter Keahlian Berhasil di Simpan"]);
        });
    }

    public function destroy($id_dokter_keahlian)
    {
        return DB::transaction(function () use ($id_dokter_keahlian) {
            DokterKeahlian::where("id_dokter_keahlian", $id_dokter_keahlian)->delete();

            return response()->json(["pesan" => "Data Dokter Keahlian Berhasil di Hapus"]);
        });
    }
}
