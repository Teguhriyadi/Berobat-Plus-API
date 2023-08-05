<?php

namespace App\Http\Controllers\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Midtrans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    protected $serverKey = "SB-Mid-server-e2RCiK9QhAuL1L5MVMW3C40H";

    public function bank()
    {
        $url = "https://api.sandbox.midtrans.com/api/v2/beneficiary_banks";

        $headers = [
            "Authorization" => "Basic " . base64_encode($this->serverKey . ":")
        ];

        $response = Http::withHeaders($headers)->get($url);

        return response()->json($response);
    }

    public function buy_product(Request $request)
    {
        try {
            $result = null;
            $payment_method = $request->payment_method;
            $order_id = "CSX" . date("YmdHis");
            $total_amount = 10000;
            $transaction = array(
                "transaction_details" => [
                    "gross_amount" => $total_amount,
                    "order_id" => $order_id
                ],
                "customer_details" => [
                    "email" => "ramadahan@Midtrans.com",
                    "first_name" => "mohammad",
                    "last_name" => "ilham",
                    "phone" => "+6281 1234 1234"
                ],
                "item_details" => array(
                    [
                        "id" => "1388998298204",
                        "price" => 5000,
                        "quantity" => 1,
                        "name" => "Ayam Zozozo"
                    ],
                    [
                        "id" => "1388998298204",
                        "price" => 5000,
                        "quantity" => 1,
                        "name" => "Ayam Zozozo"
                    ],
                ),
            );
            
            switch ($payment_method) {
                case "bank_transfer" :
                    $result = self::payment($order_id, $total_amount, $transaction);
                    break;
                    
                    case "credit_card" :
                        $result = self::creditCardCharge($order_id, $total_amount, $request->token_id, $transaction);
                        break;
                    }
                    
                    return $result;
                } catch (\Exception $e) {
                    dd($e);
                    return ["code" => 0, "message" => "Terjadi Kesalahan"];
                }
            }
            
            static function payment($order_id, $total_amount, $transaction_object)
            {
                try {
                    $transaction = $transaction_object;
                    $transaction['payment_type'] = "bank_transfer"; 
                    $transaction['bank_transfer'] = [
                        "bank" => "bca",
                        "va_number" => "11111",
                    ];
                    
                    $charge = CoreApi::charge($transaction);
                    
                    if (!$charge) {
                        return ["code" => 0, "message" => "Terjadi Kesalahan"];
                    }
                    
                    $order = new Midtrans();
                    $order->invoice = $order_id;
                    $order->transaction_id = $charge->transaction_id;
                    $order->status = "PENDING";
                    
                    if ($order->save()) 
                    return false;
                    
                    return ["code" => 1, "message" => "Success", "result" => $charge];
                    
                } catch (\Exception $e) {
                    dd($e);
                    return ["code" => 0, "message" => "Terjadi Kesalahan"];
                }
            }
            
            static function creditCardCharge($order_id, $total_amount, $token_id, $transaction_object)
            {
                try {
                    $credit_card = array(
                        "token_id" => $token_id,
                        "authentication" => true,
                        "bank" => "bni"
                    );
                    
                    $transaction = $transaction_object;
                    $transaction["payment_type"] = "credit_card";
                    $transaction["credit_card"] = $credit_card;
                    
                    $result = CoreApi::charge($transaction);
                    
                    $order = new Midtrans();
                    $order->invoice = $order_id;
                    $order->transaction_id = $order->transaction_id;
                    $order->status = "PENDING";
                    
                    if (!$order->save()) 
                    return false;
                    
                    return ["code" => 1, "message" => "Success", "result" => $result];
                    
                } catch (\Throwable $e) {
                    return ["code" => 0, "message" => "Terjadi Kesalahan | Internal Charge"];
                }
            }
            
            public function getTokenCreditCard(Request $request)
            {
                try {
                    $cc_data = [
                        "client_key" => $request->client_key,
                        "card_number" => $request->card_number,
                        "card_exp_month" => $request->card_exp_month,
                        "card_exp_year" => $request->card_exp_year,
                        "card_cvv" => $request->card_cvv
                    ];
                    
                    $data = http_build_query($cc_data);
                    
                    $token = CoreApi::token($data);
                    
                    if (!$token) {
                        return ["code" => 0, "message" => "Terjadi Kesalahan |Credit Card Tidak Valid"];
                        
                    }
                    
                    $token_id = json_decode($token->original);
                    return ["code" => 1, "message" => "Success", "result" => $token_id];
                } catch (\Throwable $e) {
                    return ["code" => 0, "message" => "Terjadi Kesalahan | Credit Card Tidak Valid"];
                }
            }
        }
        