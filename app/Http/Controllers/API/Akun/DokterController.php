<?php

namespace App\Http\Controllers\API\Akun;

use App\Http\Controllers\Controller;
use App\Http\Resources\Akun\Dokter\GetDokterResource;
use App\Models\Akun\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $dokter = Dokter::orderBy("created_at", "DESC")->paginate(10);

            return GetDokterResource::collection($dokter);
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
                "id_role" => 3,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir,
                "status" => 1
            ]);

            Dokter::create([
                "id_dokter" => "DOC-" . date("YmdHis"),
                "jabatan" => $request->jabatan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "praktik_di" => $request->praktik_di,
                "nomor_str" => $request->nomor_str,
                "user_id" => $user->id
            ]);

            return response()->json(["pesan" => "Data Dokter Berhasil di Tambahkan"]);
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $dokter = Dokter::where("id_dokter", $id)->first();

            return new GetDokterResource($dokter);
        });
    }

    public function update(Request $request, $id_dokter)
    {
        return DB::transaction(function () use ($id_dokter, $request) {

            User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt("password"),
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "id_role" => 3,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir,
                "status" => 1
            ]);

            Dokter::where("id_dokter", $id_dokter)->update([
                "jabatan" => $request->jabatan,
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "praktik_di" => $request->praktik_di,
                "nomor_str" => $request->nomor_str,
            ]);

            return response()->json(["pesan" => "Data Dokter Berhasil di Simpan"]);
        });
    }

    public function destroy($id_dokter)
    {
        return DB::transaction(function () use ($id_dokter) {

            $cek_data = Dokter::where("id_dokter", $id_dokter)->first();

            User::where("id", $cek_data->user_id)->delete();

            $cek_data->delete();

            return response()->json(["pesan" => "Data Dokter Berhasil di Hapus"]);
        });
    }
}
