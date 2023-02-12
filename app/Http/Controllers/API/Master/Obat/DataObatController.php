<?php

namespace App\Http\Controllers\API\Master\Obat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apotek\Master\Obat\GetObatResource;
use App\Models\Master\Obat\DataObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataObatController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $obat = DataObat::orderBy("created_at", "DESC")->with("getGolonganObat:id_golongan_obat,golongan_obat")->paginate(10);

            return GetObatResource::collection($obat);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            DataObat::create([
                "id_obat" => "OBT-" . date("YmdHis"),
                "nama_obat" => $request->nama_obat,
                "harga" => $request->harga,
                "deskripsi" => $request->deskripsi,
                "apotek_id" => Auth::user()->getApotek->id_owner_apotek,
                "golongan_obat_id" => $request->golongan_obat_id
            ]);

            return response()->json(["pesan" => "Data Obat Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_obat)
    {
        return DB::transaction(function () use ($id_obat) {
            $obat = DataObat::where("id_obat", $id_obat)->first();

            return new GetObatResource($obat);
        });
    }

    public function update(Request $request, $id_obat)
    {
        return DB::transaction(function () use ($id_obat, $request) {

            DataObat::where("id_obat", $id_obat)->update([
                "nama_obat" => $request->nama_obat,
                "harga" => $request->harga,
                "deskripsi" => $request->deskripsi,
                "golongan_obat_id" => $request->golongan_obat_id
            ]);

            return response()->json(["pesan" => "Data Obat Berhasil di Simpan"]);
        });
    }

    public function destroy($id_obat)
    {
        return DB::transaction(function () use ($id_obat) {

            DataObat::where("id_obat", $id_obat)->delete();

            return response()->json(["pesan" => "Data Obat Berhasil di Hapus"]);
        });
    }
}
