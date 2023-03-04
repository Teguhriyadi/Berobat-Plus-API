<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class TesXenditController extends Controller
{
    public function store(Request $request)
    {
        $secret_key = "Basic " . config("xendit.key_auth");
        $external_id = Str::random(10);

        $request_data = Http::withHeaders([
            "Authorization" => $secret_key,
        ])->post("https://api.xendit.co/v2/invoices", [
            "external_id" => $external_id,
            "amount" => $request->amount
        ]);

        $response = $request_data->object();

        Tagihan::create([
            "doc_no" => $external_id,
            "amount" => $request->amount,
            "description" => $request->description,
            "payment_status" => $response->status,
            "payment_link" => $response->invoice_url
        ]);

        return response()->json(["message" => "Data Berhasil"]);
    }

    public function callback(Request $request)
    {
        $data = $request->all();

        $status = $data["status"];
        $external_id = $data["external_id"];

        Tagihan::where("doc_no", $external_id)->update([
            "payment_status" => $status
        ]);

        return response()->json($data);
    }
}
