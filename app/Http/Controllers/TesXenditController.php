<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Xendit\Xendit;
use Carbon\Carbon;

class TesXenditController extends Controller
{
    public function index()
    {
        $secret_key = env("SECRET_KEY_XENDIT");

        Xendit::setApiKey($secret_key);

        $getVaBanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json([
            "data" => $getVaBanks
        ])->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $secret_key = env("SECRET_KEY_XENDIT");

        Xendit::setApiKey($secret_key);

        $external_id = 'va-' . time();

        $params = [
            "external_id" => $external_id,
            "bank_code" => $request->bank_code,
            "name" => $request->user_name,
            "expected_amount" => 50000,
            "is_closed" => true,
            "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
            "is_single_use" => true
        ];

        $insert = Tagihan::create([
            "external_id" => $external_id,
            "payment_channel" => "Virtual Account",
            "email" => $request->email,
            "harga" => $request->harga
        ]);

        $createVA = \Xendit\VirtualAccounts::create($params);
        return response()->json([
            "data" => $createVA
        ])->setStatusCode(200);
    }

    public function callbackVa(Request $request)
    {
        $external_id = $request->external_id;
        $status = $request->status;
        $payment = Tagihan::where("external_id", $external_id)->exists();

        if ($payment) {
            if ($status == "ACTIVE") {
                $update = Tagihan::where("external_id", $external_id)->update([
                    "status" => 1
                ]);

                if ($update > 0) {
                    return response()->json(["pesan" => "Data Berhasil di Simpan"]);
                }

                return false;
            }
        } else {
            return response()->json([
                "message" => "Data Tidak Ada"
            ]);
        }
    }
}
