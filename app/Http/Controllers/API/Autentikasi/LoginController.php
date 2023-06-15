<?php

namespace App\Http\Controllers\API\Autentikasi;

use App\Http\Controllers\Controller;
use App\Models\Akun\Dokter;
use App\Models\Akun\Perawat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

        if ($user->status != "1") {
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

        $token = $user->createToken("api", [$user->getRole->nama_role]);

        Auth::login($user);

        $user['token'] = $token->plainTextToken;

        return response()->json(["message" => "Berhasil Login",  "data"=> $user]);
    }

    public function logout()
    {
        $user = Auth::user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json(["pesan" => "Anda Berhasil Logout"]);
    }

    public function register(Request $request)
    {
        return DB::transaction(function() use($request) {
            
            if ($request->file("foto")) {
                $data = $request->file("foto")->store("profil_ahli");
            }

            if ($request->file("file_dokumen")) {
                $dokumen = $request->file("file_dokumen")->store("dokumen");
            }

            $user = User::create([
                "nama" => $request->nama,
                "password" => bcrypt($request->password),
                " B  " => $request->nomor_hp,
                "id_role" =>  $request->option == "dokter" ? "RO-2003062" : "RO-2003063",
                "jenis_kelamin" => $request->jenis_kelamin,
                "foto" => url("storage/" . $data),
                "status" => "0"
            ]);

            if ($request->option == "dokter") {
                Dokter::create([
                    "id_dokter" => "DKTR-" . date("YmdHis"),
                    "user_id" => $user["id"],
                    "file_dokumen" => url("storage/".$dokumen)
                ]);
            } else if ($request->option == "perawat") {
                Perawat::create([
                    "id_perawat" => "PWT-" . date("YmdHis"),
                    "user_id" => $user["id"],
                    "file_dokumen" => url("storage" . $dokumen)
                ]);
            }

            return response()->json(["pesan" => "Data Ahli Berhasil di Tambahkan"]);
        });
    }
}
