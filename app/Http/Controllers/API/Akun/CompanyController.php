<?php

namespace App\Http\Controllers\API\Akun;

use App\Http\Controllers\Controller;
use App\Http\Resources\Akun\Company\GetCompanyResource;
use App\Models\Akun\Company;
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
            Company::create([
                "id_company" => "CMP-" . date("YmdHis"),
                "nama_company" => $request->nama_company,
                "lokasi_company" => $request->lokasi_company,
                "user_id" => Auth::user()->id
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
            Company::where("id_company", $id_company)->delete();

            return response()->json(["pesan" => "Data Company Berhasil di Hapus"]);
        });
    }
}
