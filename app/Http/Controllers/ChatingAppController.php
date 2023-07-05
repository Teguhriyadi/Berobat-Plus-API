<?php

namespace App\Http\Controllers;

use App\Events\NewApplication;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatingAppController extends Controller
{
    public function send()
    {
        return DB::transaction(function () {
            event(new NewApplication("Hamdan"));
            
            return response()->json(["message" => "Berhasil"]);
        });
    }
}
