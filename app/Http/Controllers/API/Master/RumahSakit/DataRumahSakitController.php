<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\RumahSakit\RS\GetRumahSakitResource;
use App\Models\Akun\RumahSakit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataRumahSakitController extends Controller
{
    protected $user_id;

    public function index()
    {
        return DB::transaction(function () {
            $rs = RumahSakit::paginate(4);

            return GetRumahSakitResource::collection($rs);
        });
    }

    public function store(Request $request)
    {
        $this->user_id = Auth::user()->id;

        return DB::transaction(function () use ($request) {
            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "id_role" => "RO-2003066",
                "created_by" => $this->user_id,
                "status" => 1
            ]);

            RumahSakit::create([
                "id_rumah_sakit" => "RS-" . date("YmdHis"),
                "id_user" => $user["id"],
                "nama_rs" => $request->nama_rs,
                "slug_rs" => Str::slug($request->nama_rs),
                "deskripsi_rs" => $request->deskripsi_rs,
                "kategori_rs" => 1,
                "alamat_rs" => $request->alamat_rs
            ]);

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_rumah_sakit) {
            $rs = RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->first();
            return new GetRumahSakitResource($rs);
        });
    }

    public function update(Request $request, $id_rumah_sakit)
    {
        $this->user_id = Auth::user()->id;
        return DB::transaction(function () use ($request, $id_rumah_sakit) {

            RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->update([
                "nama_rs" => $request->nama_rs,
                "slug_rs" => Str::slug($request->nama_rs),
                "deskripsi_rs" => $request->deskripsi_rs,
                "kategori_rs" => 1,
                "alamat_rs" => $request->alamat_rs
            ]);

            $rs = RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->first();

            User::where("id", $rs["id_user"])->update([
                "nama" => $request->nama,
                "email" => $request->email,
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
            ]);

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Simpan"]);
        });
    }

    public function destroy($id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_rumah_sakit) {
            $rs = RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->first();

            User::where("id", $rs["id_user"])->delete();
            $rs->delete();

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Hapus"]);
        });
    }

    public function get_rs_by_id($id_user)
    {
        return DB::transaction(function() use($id_user) {
            $rs = RumahSakit::where("id_user", $id_user)->get();

            return GetRumahSakitResource::collection($rs);
        });
    }
}
