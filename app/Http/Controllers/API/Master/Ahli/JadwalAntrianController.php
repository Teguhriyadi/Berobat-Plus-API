<?php

namespace App\Http\Controllers\API\Master\Ahli;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ahli\Antrian\GetAntrianResource;
use App\Http\Resources\Master\Ahli\GetJadwalAntrianResource;
use App\Models\Master\Dokter\JadwalAntrian;
use App\Models\Transaksi\RiwayatTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JadwalAntrianController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {

            $cek = JadwalAntrian::where("status", 1)->first();

            if (empty($cek)) {
                return response()->json(["message" => "Tidak Ada Antrian"]);
            } else {
                $jadwal = JadwalAntrian::where("konsumen_id", Auth::user()->konsumen->id_konsumen)->where("status", 1)->first();
    
                return new GetJadwalAntrianResource($jadwal);
            }


        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {

            $ada = JadwalAntrian::where("konsumen_id", Auth::user()->konsumen->id_konsumen)->where("id_jadwal_praktek", $request->id_jadwal_praktek)->count();
            
            if ($ada > 0) {
                return response()->json(["pesan" => "Maaf, Anda Sudah Membuat Antrian Pada Jadwal Praktek Ini"]);
            } else {

            $cek = JadwalAntrian::first();

            if (empty($cek)) {
                $nomer_antrian = 1;
            } else {
                $praktek = JadwalAntrian::where("id_jadwal_praktek", $request->id_jadwal_praktek)->count();

                $deteksi = JadwalAntrian::where("tanggal", date("Y-m-d"))->first();

                if (empty($deteksi)) {
                    $nomer_antrian = 1;
                } else {
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
            }
        });
    }

    public function data_antrian()
    {
        return DB::transaction(function() {
            $logged_in = Auth::user()->id;

            $jadwal = JadwalAntrian::whereHas('jadwal_praktek', function($query) use ($logged_in) {
                $query->whereHas('detail_praktek', function($subquery) use ($logged_in) {
                    $subquery->where('ahli_id', $logged_in);
                });
            })->where("status", 1)->orderBy("nomer_antrian", "ASC")->get();

            return GetAntrianResource::collection($jadwal);
        });
    }

    public function detail($id_jadwal_antrian)
    {
        return DB::transaction(function() use ($id_jadwal_antrian) {
            $jadwal_antrian = JadwalAntrian::where("id_jadwal_antrian", $id_jadwal_antrian)->first();

            return new GetAntrianResource($jadwal_antrian);
        });
    }

    public function update($id_jadwal_antrian)
    {
        return DB::transaction(function() use ($id_jadwal_antrian) {
            $jadwal_antrian = JadwalAntrian::where("id_jadwal_antrian", $id_jadwal_antrian)->first();
            
            RiwayatTransaksi::create([
                "id_transaksi_buat_janji" => "TRN-BJ-" . date("YmdHis"),
                "nama" => $jadwal_antrian->konsumen->getUsers->nama,
                "nomor_hp" => $jadwal_antrian->konsumen->getUsers->nomor_hp,
                "nomer_antrian" => $jadwal_antrian->nomer_antrian,
                "nama_ahli" => $jadwal_antrian->jadwal_praktek->detail_praktek->user->nama,
                "nomor_hp_ahli" => $jadwal_antrian->jadwal_praktek->detail_praktek->user->nomor_hp,
                "foto_ahli" => null,
                "biaya_praktek" => $jadwal_antrian->jadwal_praktek->detail_praktek->biaya_praktek,
                "nama_rs" => $jadwal_antrian->jadwal_praktek->detail_praktek->rumah_sakit->nama_rs,
                "tanggal_transaksi" => date("Y-m-d"),
                "status" => 1
            ]);

            JadwalAntrian::where("id_jadwal_antrian", $id_jadwal_antrian)->update([
                "status" => "0"
            ]);

            return response()->json(["message" => "Data Berhasil di Simpan"]);
        });
    }
}
