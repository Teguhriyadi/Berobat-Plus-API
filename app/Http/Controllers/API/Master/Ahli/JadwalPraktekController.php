<?php

namespace App\Http\Controllers\API\Master\Ahli;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Ahli\GetJadwalPraktekResource;
use App\Models\Ahli\JadwalPraktek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalPraktekController extends Controller
{
    public function index($id_detail_praktek)
    {
        return DB::transaction(function() use($id_detail_praktek) {
            $jadwal = JadwalPraktek::where("id_detail_praktek", $id_detail_praktek)->get();

            return GetJadwalPraktekResource::collection($jadwal);
        });
    }

    public function store(Request $request, $id_detail_praktek)
    {
        return DB::transaction(function() use($request, $id_detail_praktek) {
            JadwalPraktek::create([
                "id_jadwal_praktek" => "JDWL-P-" . date("YmdHis"),
                "id_detail_praktek" => $id_detail_praktek,
                "tanggal" => $request->tanggal,
                "mulai_jam" => $request->mulai_jam,
                "selesai_jam" => $request->selesai_jam
            ]);

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_jadwal_praktek)
    {
        return DB::transaction(function() use($id_jadwal_praktek) {
            $jadwal = JadwalPraktek::where("id_jadwal_praktek", $id_jadwal_praktek)->first();

            return new GetJadwalPraktekResource($jadwal);
        });
    }

    public function update(Request $request, $id_jadwal_praktek)
    {
        return DB::transaction(function() use($request, $id_jadwal_praktek) {
            JadwalPraktek::where("id_jadwal_praktek", $id_jadwal_praktek)->update([
                "tanggal" => $request->tanggal,
                "mulai_jam" => $request->mulai_jam,
                "selesai_jam" => $request->selesai_jam
            ]);

            return response()->json(["pesan" => "Data Berhasil di Simpan"]);
        });
    }

    public function destroy($id_jadwal_praktek)
    {
        return DB::transaction(function() use($id_jadwal_praktek) {
            JadwalPraktek::where("id_jadwal_praktek", $id_jadwal_praktek)->delete();

            return response()->json(["pesan" => "Data Berhasil di Hapus"]);
        });
    }
}
