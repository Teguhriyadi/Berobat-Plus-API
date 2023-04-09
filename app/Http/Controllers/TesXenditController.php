<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Xendit\Xendit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TesXenditController extends Controller
{
    protected $secret_key;

    public function __construct()
    {
        $this->secret_key = env("SECRET_KEY_XENDIT");
    }

    public function list()
    {
        Xendit::setApiKey($this->secret_key);

        $getList = \Xendit\PaymentChannels::list();

        return response()->json([
            "data" => $getList
        ]);
    }

    public function create_customer(Request $request)
    {
        Xendit::setApiKey($this->secret_key);

        $customerParams = [
            "reference_id" => Str::random(10),
            "type" => "INDIVIDUAL",
            "individual_detail" => [
                "given_names" => "Mohammad",
            ],
            "business_detail" => [
                "business_name" => "BUSINESS",
                "business_type" => "GOVERNMENT"
            ]
        ];

        $createCustomer = \Xendit\Customers::createCustomer($customerParams);

        return response()->json([
            "data" => $createCustomer
        ])->setStatusCode(200);
    }

    public function index()
    {
        $secret_key = env("SECRET_KEY_XENDIT");

        Xendit::setApiKey($secret_key);

        // $getVaBanks = \Xendit\VirtualAccounts::getVABanks();

        // $getBalance = \Xendit\PaymentChannels::list();
        $getBalance = \Xendit\Invoice::retrieveAll();

        return response()->json([
            "data" => $getBalance
        ])->setStatusCode(200);
    }

    public function store(Request $request)
    {
        $secret_key = env("SECRET_KEY_XENDIT");

        Xendit::setApiKey($secret_key);

        $external_id = 'va-' . time();

        // Create Charge

        $params = [
            'token_id' => '5e2e8231d97c174c58bcf644',
            'external_id' => 'card_' . time(),
            'authentication_id' => Auth::user()->token,
            'amount' => 100000,
            'card_cvn' => '123',
            'capture' => false
        ];

        // $params = [
        //     "external_id" => $external_id,
        //     "bank_code" => $request->bank_code,
        //     "name" => $request->user_name,
        //     "expected_amount" => 50000,
        //     "is_closed" => true,
        //     "expiration_date" => Carbon::now()->addDays(1)->toISOString(),
        //     "is_single_use" => true
        // ];

        $insert = Tagihan::create([
            "external_id" => $external_id,
            "payment_channel" => "Virtual Account",
            "email" => $request->email,
            "harga" => $request->harga
        ]);

        // $createVA = \Xendit\VirtualAccounts::create($params);
        $createCharge = \Xendit\Cards::create($params);

        return response()->json([
            "data" => $createCharge
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
