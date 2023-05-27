<?php

namespace App\Http\Controllers\API\Akun\Public;

use App\Http\Controllers\Controller;
use App\Models\Akun\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivateAccountController extends Controller
{
    public function active_account($id_user)
    {
        return DB::transaction(function () use ($id_user) {

            $cek = User::where("id", $id_user)->first();

            User::where("id", $id_user)->update([
                "created_by" => Auth::user()->id,
                "status" => $cek->status == "1" ? "0" : "1"
            ]);

            return response()->json(["pesan" => "Status Akun Berhasil Diubah"]);
        });
    }

    public function active_account_dokter(Request $request, $id_dokter)
    {
        return DB::transaction(function() use ($request, $id_dokter) {

            Dokter::where("id_dokter", $id_dokter)->update([
                "nomor_str" => $request->nomor_str
            ]);

            $dokter = Dokter::where("id_dokter", $id_dokter)->first();

            User::where("id", $dokter["user_id"])->update([
                "created_by" => Auth::user()->id,
                "status" => "1",
            ]);

            return response()->json(["pesan" => "Data Berhasil di Simpan"]);

        });
    }
}
