<?php

namespace App\Http\Controllers\API\Akun;

use App\Http\Controllers\Controller;
use App\Http\Resources\Akun\Company\GetCompanyResource;
use App\Models\Akun\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $company = Company::orderBy("created_at", "DESC")->paginate(10);

            return GetCompanyResource::collection($company);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt("rumah_sakit"),
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "id_role" => 2,
                "created_by" => Auth::user()->id,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir,
                "status" => 1
            ]);

            Company::create([
                "id_company" => "CMP-" . date("YmdHis"),
                "nama_company" => $request->nama,
                "lokasi_company" => $request->lokasi_company,
                "user_id" => $user->id
            ]);

            return response()->json(["pesan" => "Data Company Berhasil di Tambahkan"]);
        });
    }

    public function edit($id)
    {
        return DB::transaction(function () use ($id) {
            $company = Company::where("id_company", $id)->first();

            return new GetCompanyResource($company);
        });
    }

    public function update(Request $request, $id_company)
    {
        return DB::transaction(function () use ($id_company, $request) {

            $company = Company::where("id_company", $id_company)->first();

            User::where("id", $company->user_id)->update([
                "nama" => $request->nama,
                "email" => $request->email,
                "nomor_hp" => $request->nomor_hp,
                "alamat" => $request->alamat,
                "jenis_kelamin" => $request->jenis_kelamin,
                "usia" => $request->usia,
                "berat_badan" => $request->berat_badan,
                "tinggi_badan" => $request->tinggi_badan,
                "tanggal_lahir" => $request->tanggal_lahir,
            ]);

            Company::where("id_company", $id_company)->update([
                "nama_company" => $request->nama_company,
                "lokasi_company" => $request->lokasi_company,
            ]);

            return response()->json(["pesan" => "Data Company Berhasil di Simpan"]);
        });
    }

    public function destroy($id_company)
    {
        return DB::transaction(function () use ($id_company) {

            $company = Company::where("id_company", $id_company)->first();

            User::where("id", $company->user_id)->delete();

            $company->delete();

            return response()->json(["pesan" => "Data Company Berhasil di Hapus"]);
        });
    }
}
