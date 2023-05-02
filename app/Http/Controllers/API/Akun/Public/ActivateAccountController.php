<?php

namespace App\Http\Controllers\API\Akun\Public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ActivateAccountController extends Controller
{
    public function active_account($id_user)
    {
        return DB::transaction(function () use ($id_user) {

            if (Auth::user()->status == "0") {
                $status = "1";
            } else if (Auth::user()->status == "1") {
                $status = "0";
            }

            User::where("id", $id_user)->update([
                "created_by" => Auth::user()->id,
                "status" => $status
            ]);

            return response()->json(["pesan" => "Status Akun Berhasil Diubah"]);
        });
    }
}
