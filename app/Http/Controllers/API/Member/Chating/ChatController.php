<?php

namespace App\Http\Controllers\API\Member\Chating;

use App\Http\Controllers\Controller;
use App\Http\Resources\Member\Chating\GetChatResource;
use App\Models\Master\Chat\ChatDokter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{

    public function index($user_id)
    {

        return DB::transaction(function () use ($user_id) {
            $chat = ChatDokter::where("user_id", $user_id)->get();

            return GetChatResource::collection($chat);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $cek = ChatDokter::where("id_dokter", $request->id_dokter)
                ->where("uid_partner", $request->uid_partner)
                ->where("tanggal", date("Y-m-d"))
                ->count();

            if ($cek == 0) {
                ChatDokter::create([
                    "id_chat_dokter" => "CHT-" . date("YmdHis"),
                    "id_dokter" => $request->id_dokter,
                    "uid_partner" => $request->uid_partner,
                    "user_id" => $request->user_id,
                    "tanggal" => date("Y-m-d")
                ]);

                return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
            } else {
                return response()->json(["pesan" => "Berhasil"]);
            }
        });
    }
}
