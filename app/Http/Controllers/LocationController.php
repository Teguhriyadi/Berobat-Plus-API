<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller

{
    public function findNearest(Request $request)
    {
        $lat = "-6.352326";
        $long = "108.3203647";

        $locations = DB::table('rumah_sakit')
            ->select('id_rumah_sakit', 'nama_rs', 'latitude', 'longitude')
            ->selectRaw('(6371 * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) * cos(radians(longitude) - radians(' . $long . ')) + sin(radians(' . $lat . ')) * sin(radians(latitude)))) AS distance')
            ->orderBy('distance', 'ASC')
            ->get();

        return response()->json($locations);
    }
}
