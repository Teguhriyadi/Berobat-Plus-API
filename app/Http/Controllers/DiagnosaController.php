<?php

namespace App\Http\Controllers;

use App\Http\Resources\Penyakit as ResourcesPenyakit;
use App\Models\Penyakit;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function diagnosa(Request $request)
    {
        // ambil gejala yang terpilih oleh pasien dari input form
        $gejala_pasien = $request->input('gejala');

        // ambil semua penyakit dari database
        $penyakit = Penyakit::all();

        // hitung skor bobot gejala untuk setiap penyakit
        foreach ($penyakit as $p) {
            $skor_bobot = 0;

            // ambil gejala yang terkait dengan penyakit
            $gejala_penyakit = $p->gejala;

            // hitung skor bobot gejala dari input pasien
            foreach ($gejala_pasien as $gp) {
                if ($gejala_penyakit->contains('id', $gp)) {
                    $skor_bobot += 1; // set bobot gejala yang dipilih menjadi 1
                }
            }

            // hitung total skor bobot gejala untuk penyakit tersebut
            $p->skor_bobot = $skor_bobot;
        }

        // urutkan penyakit berdasarkan skor bobot terbesar ke terkecil
        $penyakit = $penyakit->sortByDesc('skor_bobot');

        // kirim data penyakit dan skor bobot ke view
        return ResourcesPenyakit::collection($penyakit);
    }
}
