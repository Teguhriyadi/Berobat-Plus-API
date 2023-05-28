<?php

namespace App\Http\Controllers;

use App\Events\ChatingMessageEvent;
use Illuminate\Http\Request;

class ChatingController extends Controller
{
    public function chating()
    {
        event(new ChatingMessageEvent("Hallo"));
    }
}
