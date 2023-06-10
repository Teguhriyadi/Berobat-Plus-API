<?php

namespace App\Http\Controllers\API\Master\Ahli;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Ahli\GetDetailPraktekrResource;
use App\Http\Resources\Master\Ahli\GetJadwalPraktekResource;
use App\Models\Ahli\DetailPraktek;
use App\Models\Ahli\JadwalPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPraktekController extends Controller
{
    public function index($id_rumah_sakit)
    {
        return DB::transaction(function () use($id_rumah_sakit) {
            $detail = DetailPraktek::where("id_rumah_sakit", $id_rumah_sakit)->with("user:id,nama,nomor_hp")->with("rumah_sakit:id_rumah_sakit,nama_rs")->get();

            return GetDetailPraktekrResource::collection($detail);
        });
    }

    public function store(Request $request, $id_rumah_sakit)
    {
        return DB::transaction(function() use ($request, $id_rumah_sakit) {
            DetailPraktek::create([
                "id_detail_praktek" => "JDWL-P-" . date("YmdHis"),
                "ahli_id" => $request->ahli_id,
                "id_rumah_sakit" => $id_rumah_sakit,
                "biaya_praktek" => $request->biaya_pratek
            ]);

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_detail_praktek)
    {
        return DB::transaction(function() use($id_detail_praktek) {
            
            $edit = DetailPraktek::where("id_detail_praktek", $id_detail_praktek)->with("user:id,nama,nomor_hp")->with("rumah_sakit:id_rumah_sakit,nama_rs")->first();

            return new GetDetailPraktekrResource($edit);
        });
    }

    public function update(Request $request, $id_detail_praktek)
    {
        return DB::transaction(function() use($request, $id_detail_praktek) {
            DetailPraktek::where("id_detail_praktek", $id_detail_praktek)->update([
                "ahli_id" => $request->ahli_id,
                "biaya_praktek" => $request->biaya_praktek
            ]);

            return response()->json(["pesan" => "Data Berhasil di Simpan"]);
        });
    }

    public function destroy($id_detail_praktek)
    {
        return DB::transaction(function() use($id_detail_praktek) {
            DetailPraktek::where("id_detail_praktek", $id_detail_praktek)->delete();

            return response()->json(["pesan" => "Data Berhasil di Hapus"]);
        });
    }

    public function list_jadwal_praktek($id_jadwal_praktek)
    {
        return DB::transaction(function() use($id_jadwal_praktek) {
            $list_data = JadwalPraktek::where("id_detail_praktek", $id_jadwal_praktek)->with("detail_praktek:id_detail_praktek,ahli_id")->get();

            return GetJadwalPraktekResource::collection($list_data);
        });
    }
}
