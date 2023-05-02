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
            $dokter = Dokter::orderBy(DB::raw("RAND()"))->with("getUser:id,nama,email,jenis_kelamin,nomor_hp,alamat,tempat_lahir,tempat_lahir,tanggal_lahir,status")->with("getBiaya:id_biaya_dokter,id_dokter,biaya")->paginate(2);

            return GetDokterResource::collection($dokter);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "id_role" => "RO-2003062",
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir,
                "status" => "0"
            ]);

            Dokter::create([
                "id_dokter" => "DOC-" . date("YmdHis"),
                "pendidikan_terakhir" => $request->pendidikan_terakhir,
                "nomor_str" => $request->nomor_str,
                "user_id" => $user->id,
                "kelas" => $request->kelas
            ]);

            return response()->json(["pesan" => "Data Dokter Berhasil di Tambahkan"]);
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $dokter = Dokter::where("id_dokter", $id)->with("getUser:id,nama,email,jenis_kelamin,nomor_hp,alamat,tempat_lahir,tanggal_lahir")->first();

            return new GetDokterResource($dokter);
        });
    }

    public function update(Request $request, $id_dokter)
    {
        return DB::transaction(function () use ($id_dokter, $request) {

            $dokter = Dokter::where("id_dokter", $id_dokter)->first();

            User::where("id", $dokter->user_id)->update([
                "nama" => $request->nama,
                "email" => $request->email,
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir
            ]);

            Dokter::where("id_dokter", $id_dokter)->update([
                "nomor_str" => $request->nomor_str,
                "kelas" => $request->kelas
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

    public function all_data()
    {
        return DB::transaction(function () {
            $dokter = Dokter::orderBy(DB::raw("RAND()"))->with("getUser:id,nama,email,jenis_kelamin,nomor_hp,alamat,tempat_lahir,tempat_lahir,tanggal_lahir,status")->paginate(10);

            return GetDokterResource::collection($dokter);
        });
    }

    public function uid_partner($uid_partner)
    {
        return DB::transaction(function () use ($uid_partner) {
            $list = Dokter::where("id_dokter", $uid_partner)->get();

            return GetDokterResource::collection($list);
        });
    }
}
