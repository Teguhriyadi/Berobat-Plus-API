<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Torann\GeoIP\GeoIP;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller

{
    public function findNearest(Request $request)
    {
        $lat = "-6.4079173";
        $long = "108.2825259";

        $data = DB::table("users")
            ->select(
                "users.id",
                DB::raw("6371 * acos(cos(radians(' . $lat . '))
            * cos(radians(users.latitude))
            * cos(radians(users.longtitude) - radians(' . $long . '))
            + sin(radians(' .$lat. '))
            * sin(radians(users.latitude))) AS distance")
            )->orderBy("distance", "DESC")
            ->get();

        return $data;
    }
}
