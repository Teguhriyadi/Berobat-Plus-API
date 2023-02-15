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
            User::where("id", $id_user)->update([
                "created_by" => Auth::user()->id,
                "status" => 1
            ]);

            return response()->json(["pesan" => "Akun Berhasil di Aktifkan"]);
        });
    }
}
