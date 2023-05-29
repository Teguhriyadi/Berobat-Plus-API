<?php

namespace App\Http\Controllers;

use App\Events\ChatingMessageEvent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatingController extends Controller
{
    public function index(Request $request)
    {
        return DB::transaction(function() use($request) {
            $message = Message::create([
                "user_id" => 2,
                "message" => $request->message
            ]);

            event(new ChatingMessageEvent($message));

            return response()->json(["pesan" => "Data Berhasil di Simpan"], 200);

        });
    }

    public function chating()
    {
        event(new ChatingMessageEvent("Hallo"));
    }
}
