<?php

namespace App\Http\Controllers;

use App\Events\ChatingMessageEvent;
use App\Events\EveryoneChannel;
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

    public function handle(Request $request)
    {
        $randomNumber = mt_rand(); // Menghasilkan angka acak

        if ($randomNumber) {
            // Mengizinkan atau menolak koneksi berdasarkan logika Anda
            $socketId = $randomNumber;
            return response()->json(['socket_id' => $socketId, 'message' => 'Connection authorized']);
        }

        $event = $request->input('event');
        $data = $request->input('data');

        if ($event && $data) {
            // Proses event yang diterima
            event(new EveryoneChannel($event, $data));
            return response()->json(['message' => 'Event processed']);
        }

        return response()->json(['message' => 'Invalid request'], 400);
    }
}
