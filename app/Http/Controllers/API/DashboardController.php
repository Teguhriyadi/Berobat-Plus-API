<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Akun\Dokter;
use App\Models\Akun\Konsumen;
use App\Models\Akun\OwnerApotek;
use App\Models\Akun\Perawat;
use App\Models\TestingPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function pembayaran()
    {
        $data["pembayaran"] = TestingPayment::get();

        return view("pembayaran", $data);
    }

    public function invoice(Request $request)
    {
        $secret_key = 'Basic ' . config("xendit.key_auth");
        $external_id = Str::random(10);
        $dataRequest = Http::withHeaders([
            "Authorization" => $secret_key
        ])->post("https://api.xendit.co/v2/invoices", [
            "external_id" => $external_id,
            "amount" => 5000
        ]);

        TestingPayment::create([
            "external_id" => $dataRequest->object()->id,
            "payment_channel" => "Simulasi Pembayaran",
            "status" => 0,
            "harga" => 5000
        ]);

        // return response()->json(["data" => $dataRequest->object()]);
        return back();
    }

    public function callback(Request $request)
    {
        TestingPayment::where("external_id", $request->external_id)->update([
            "status" => 1
        ]);

        return back("/pembayaran");
    }

    public function create_api()
    {
        $user = User::find(1);

        $token = $user->createToken("ApiToken")->plainTextToken;

        $response = [
            "success" => true,
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
    }

    public function dashboard()
    {
        $data = [
            "dokter" => Dokter::count(),
            "perawat" => Perawat::count(),
            "konsumen" => Konsumen::count(),
            "apotek" => OwnerApotek::count()
        ];

        return response()->json(["jumlah_data" => [$data]]);
    }
}
