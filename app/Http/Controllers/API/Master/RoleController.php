<?php

namespace App\Http\Controllers\API\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function update(Request $request, $id_role)
    {
        return DB::transaction(function () use ($id_role, $request) {

            Role::where("id_role", $id_role)->update([
                "nama_role" => $request->nama_role,
            ]);

            return response()->json(["pesan" => "Data Role Berhasil di Simpan"]);
        });
    }

    public function destroy($id_role)
    {
        return DB::transaction(function () use ($id_role) {

            Role::where("id_role", $id_role)->delete();

            return response()->json(["pesan" => "Data Role Berhasil di Hapus"]);
        });
    }
}
