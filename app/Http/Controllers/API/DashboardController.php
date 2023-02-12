<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Akun\Dokter;
use App\Models\Akun\Konsumen;
use App\Models\Akun\OwnerApotek;
use App\Models\Akun\Perawat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
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
