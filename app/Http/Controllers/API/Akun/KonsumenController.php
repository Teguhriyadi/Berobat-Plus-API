<?php

namespace App\Http\Controllers\API\Akun;

use App\Http\Controllers\Controller;
use App\Http\Resources\Akun\Konsumen\GetKonsumenResource;
use App\Models\Akun\Konsumen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsumenController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $konsumen = Konsumen::orderBy("created_at", "DESC")->paginate(10);

            return GetKonsumenResource::collection($konsumen);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt("password"),
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "id_role" => "RO-2003064",
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir,
                "status" => 1
            ]);

            Konsumen::create([
                "id_konsumen" => "KSN-" . date("YmdHis"),
                "user_id" => $user->id,
                "nik" => $request->nik
            ]);

            return response()->json(["pesan" => "Data Konsumen Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_konsumen)
    {
        return DB::transaction(function () use ($id_konsumen) {
            $konsumen = Konsumen::where("id_konsumen", $id_konsumen)->first();

            return new GetKonsumenResource($konsumen);
        });
    }

    public function update(Request $request, $id_konsumen)
    {
        return DB::transaction(function () use ($id_konsumen, $request) {

            $konsumen = Konsumen::where("id_konsumen", $id_konsumen)->first();

            User::where("id", $konsumen->user_id)->update([
                "nama" => $request->nama,
                "email" => $request->email,
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tempat_lahir" => $request->tempat_lahir,
                "tanggal_lahir" => $request->tanggal_lahir
            ]);

            Konsumen::where("id_konsumen", $id_konsumen)->update([
                "nik" => $request->nik
            ]);

            return response()->json(["pesan" => "Data Konsumen Berhasil di Simpan"]);
        });
    }

    public function destroy($id_konsumen)
    {
        return DB::transaction(function () use ($id_konsumen) {

            Konsumen::where("id_konsumen", $id_konsumen)->delete();

            return response()->json(["pesan" => "Data Konsumen Berhasil di Hapus"]);
        });
    }
}
