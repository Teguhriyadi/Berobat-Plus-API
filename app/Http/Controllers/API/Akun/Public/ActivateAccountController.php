<?php

namespace App\Http\Controllers\API\Akun\Public;

use App\Http\Controllers\Controller;
use App\Models\Ahli\BiayaPraktek;
use App\Models\Akun\Dokter;
use App\Models\Akun\OwnerApotek;
use App\Models\Akun\Perawat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivateAccountController extends Controller
{
    public function active_account($id_user)
    {
        return DB::transaction(function () use ($id_user) {

            echo $id_user;

            die();
            $cek = User::where("id", $id_user)->first();

            User::where("id", $id_user)->update([
                "created_by" => Auth::user()->id,
                "status" => $cek->status == "1" ? "0" : "1"
            ]);



            return response()->json(["pesan" => "Status Akun Berhasil Diubah"]);
        });
    }

    public function active_account_status(Request $request, $id_user)
    {
        return DB::transaction(function() use ($request, $id_user) {

            $user = User::where("id", $id_user)->first();

            if ($user["id_role"] == "RO-2003062") {
                $dokter = Dokter::where("user_id", $user["id"])->first();

                Dokter::where("id_dokter", $dokter["id_dokter"])->update([
                    "nomor_str" => $request->nomor_str
                ]);
                
                BiayaPraktek::create([
                    "id_biaya_praktek" => "BIA-P-" . date("YmdHis"),
                    "ahli_id" => $id_user,
                    "biaya" => 0
                ]);
            } else if($user["id_role"] == "RO-2003063") {
                $perawat = Perawat::where("user_id", $user["id"])->first();

                Perawat::where("id_perawat", $perawat["id_perawat"])->update([
                    "nomor_strp" => $request->nomor_strp
                ]);
            }

            User::where("id", $user["id"])->update([
                "created_by" => Auth::user()->id,
                "status" => 1
            ]);

            return response()->json(["pesan" => "Data Berhasil di Simpan"]);

        });
    }
}
