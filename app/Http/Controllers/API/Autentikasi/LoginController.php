<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where("nomor_hp", $request->nomor_hp)->first();

        if (!$user) {
            return response()->json(
                ["pesan" => "Akun Tidak Terdaftar"],
                404
            );
        }

        if ($user->status != 1) {
            return response()->json(
                ["pesan" => "Akun Sedang Tidak Aktif"],
                404
            );
        }

        $cekPassword = Hash::check($request->password, $user->password);

        if (!$cekPassword) {
            return response()->json(
                ["pesan" => "Password Salah"],
                404
            );
        }

        if ($user->id_role == 1) {
            $text = "super_admin";
        } else if ($user->id_role == 2) {
            $text = "rumah_sakit";
        } else if ($user->id_role == 3) {
            $text = "dokter";
        } else if ($user->id_role == 4) {
            $text = "konsumen";
        }

        $token = $user->createToken("api", [$text]);

        Auth::login($user);

        $user['token'] = $token->plainTextToken;

        return response()->json($user);
    }
}