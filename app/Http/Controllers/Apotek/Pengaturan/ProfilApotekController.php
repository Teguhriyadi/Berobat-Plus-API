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
                "id_user" => Auth::user()->id,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude
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
                "nomor_hp" => $request->nomor_hp,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude
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

    public function ubah_status($id_profil_apotek)
    {
        return DB::transaction(function () use ($id_profil_apotek) {
            $profil_apotek = ProfilApotek::where("id_profil_apotek", $id_profil_apotek)->first();

            if ($profil_apotek->status == 1) {
                $profil_apotek->status = 0;
            } else if ($profil_apotek->status == 0) {
                $profil_apotek->status = 1;
            }

            $profil_apotek->update();

            return response()->json(["pesan" => "Data Status Berhasil di Simpan"]);
        });
    }

    public function find_nearest(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $lat = $request->latitude;
            $long = $request->longitude;
            // $lat = "-6.352326";
            // $long = "108.3203647";

            $locations = DB::table('profil_apotek')
                ->select('id_profil_apotek', 'nama_apotek', 'latitude', 'longitude')
                ->selectRaw('(6371 * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) * cos(radians(longitude) - radians(' . $long . ')) + sin(radians(' . $lat . ')) * sin(radians(latitude)))) AS distance')
                ->orderBy('distance', 'ASC')
                ->get();

            return response()->json($locations);
        });
    }
}
