<?php

namespace App\Http\Controllers\Apotek\Pengaturan;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apotek\Pengaturan\ProfilApotekResource;
use App\Models\Apotek\Pengaturan\ProfilApotek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProfilApotekController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $profil = ProfilApotek::orderBy("created_at", "DESC")->with("getUser:id,nama")->paginate(10);

            return ProfilApotekResource::collection($profil);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            ProfilApotek::create([
                "id_profil_apotek" => "PR-A-" . date("YmdHis"),
                "nama_apotek" => $request->nama_apotek,
                "slug_apotek" => Str::slug($request->nama_apotek),
                "deskripsi_apotek" => $request->deskripsi_apotek,
                "alamat_apotek" => $request->alamat_apotek,
                "nomor_hp" => $request->nomor_hp,
                "status" => 0,
                "id_user" => Auth::user()->id
            ]);

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_profil_apotek)
    {
        return DB::transaction(function () use ($id_profil_apotek) {
            $keahlian = ProfilApotek::where("id_profil_apotek", $id_profil_apotek)->with("getUser:id,nama")->first();

            return new ProfilApotekResource($keahlian);
        });
    }

    public function update(Request $request, $id_profil_apotek)
    {
        return DB::transaction(function () use ($request, $id_profil_apotek) {
            ProfilApotek::where("id_profil_apotek", $id_profil_apotek)->update([
                "nama_apotek" => $request->nama_apotek,
                "slug_apotek" => Str::slug($request->nama_apotek),
                "deskripsi_apotek" => $request->deskripsi_apotek,
                "alamat_apotek" => $request->alamat_apotek,
                "nomor_hp" => $request->nomor_hp
            ]);

            return response()->json(["pesan" => "Data Berhasil di Simpan"]);
        });
    }

    public function destroy($id_profil_apotek)
    {
        return DB::transaction(function () use ($id_profil_apotek) {
            ProfilApotek::where("id_profil_apotek", $id_profil_apotek)->delete();

            return response()->json(["pesan" => "Data Berhasil di Hapus"]);
        });
    }

    public function aktifkan(Request $request)
    {
        return DB::transaction(function () use ($request) {
            ProfilApotek::where("id_profil_apotek", $request->id_profil_apotek)->update([
                "status" => 1
            ]);

            return response()->json(["pesan" => "Data Status Berhasil di Aktifkan"]);
        });
    }

    public function non_aktifkan(Request $request)
    {
        return DB::transaction(function () use ($request) {
            ProfilApotek::where("id_profil_apotek", $request->id_profil_apotek)->update([
                "status" => 0
            ]);

            return response()->json(["pesan" => "Data Status Berhasil di Non - Aktifkan"]);
        });
    }
}
