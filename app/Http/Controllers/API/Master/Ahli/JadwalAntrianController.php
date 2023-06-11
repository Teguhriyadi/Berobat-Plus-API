<?php

namespace App\Http\Controllers\API\Master\Ahli;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Ahli\GetJadwalAntrianResource;
use App\Models\Master\Dokter\JadwalAntrian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalAntrianController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $jadwal = JadwalAntrian::orderBy("id_jadwal_antrian", "DESC")->get();

            return GetJadwalAntrianResource::collection($jadwal);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {

            $nomer = 0;

            $cek = JadwalAntrian::first();

            if (empty($cek)) {
                $nomer_antrian = 1;
            } else {
                $praktek = JadwalAntrian::where("id_jadwal_praktek", $request->id_jadwal_praktek)->count();

                $deteksi = JadwalAntrian::where("tanggal", date("Y-m-d"))->first();

                if (empty($deteksi)) {
                    $nomer_antrian = 1;
                } else {
                    // $data = JadwalAntrian::get();

                    // $awal = 0;

                    // foreach ($data as $d) {
                    //     if ($d["nomer_antrian"] > $awal) {
                    //         $cetak = $d["nomer_antrian"];
                    //     }
                    // }

                    // $nomer_antrian = $cetak + 1;
                    $praktek = JadwalAntrian::where("id_jadwal_praktek", $request->id_jadwal_praktek)->count();

                    if ($praktek > 0) {
                        $nomer_antrian = JadwalAntrian::where("id_jadwal_praktek", $request->id_jadwal_praktek)->max("nomer_antrian") + 1;
                    } else {
                        $nomer_antrian = 1;
                    }
                }
            }

            $jadwal = JadwalAntrian::create([
                "id_jadwal_antrian" => "JDWL-A-" . date("YmdHis"),
                "konsumen_id" => Auth::user()->konsumen->id_konsumen,
                "ahli_id" => $request->ahli_id,
                "id_jadwal_praktek" => $request->id_jadwal_praktek,
                "nomer_antrian" => $nomer_antrian,
                "status" => 1,
                "tanggal" => date("Y-m-d")
            ]);

            return response()->json([
                "pesan" => "Data Berhasil di Tambahkan", 
                "data" => [
                    "antrian" => $jadwal["nomer_antrian"],
                    "tanggal" => $jadwal["tanggal"]
                ]
            ]);
        });
    }
}
