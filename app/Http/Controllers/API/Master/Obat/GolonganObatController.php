<?php

namespace App\Http\Controllers\API\Master\Obat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apotek\Master\Obat\GolonganObatResource;
use App\Models\Master\Obat\GolonganObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GolonganObatController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $gol_obat = GolonganObat::orderBy("created_at", "DESC")->paginate(10);

            return GolonganObatResource::collection($gol_obat);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            GolonganObat::create([
                "id_golongan_obat" => "GOL-O-" . date("YmdHis"),
                "golongan_obat" => $request->golongan_obat
            ]);

            return response()->json(["pesan" => "Data Golongan Obat Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_golongan_obat)
    {
        return DB::transaction(function () use ($id_golongan_obat) {
            $gol_obat = GolonganObat::where("id_golongan_obat", $id_golongan_obat)->first();

            return new GolonganObatResource($gol_obat);
        });
    }

    public function update(Request $request, $id_golongan_obat)
    {
        return DB::transaction(function () use ($id_golongan_obat, $request) {

            GolonganObat::where("id_golongan_obat", $id_golongan_obat)->update([
                "golongan_obat" => $request->golongan_obat,
            ]);

            return response()->json(["pesan" => "Data Golongan Obat Berhasil di Simpan"]);
        });
    }

    public function destroy($id_golongan_obat)
    {
        return DB::transaction(function () use ($id_golongan_obat) {

            GolonganObat::where("id_golongan_obat", $id_golongan_obat)->delete();

            return response()->json(["pesan" => "Data Golongan Obat Berhasil di Hapus"]);
        });
    }
}
