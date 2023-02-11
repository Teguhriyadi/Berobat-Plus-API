<?php

namespace App\Http\Controllers\API\Akun;

use App\Http\Controllers\Controller;
use App\Http\Resources\Akun\AllAccount\GetAllAccountResource;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AllAccountController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $all_account = User::orderBy("created_at", "DESC")->with("getRole:id_role,nama_role")->get();

            return GetAllAccountResource::collection($all_account);
        });
    }
}
