<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Transaksi\ResepObat;
use App\Models\Transaksi\ResepObatDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResepObatController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $resep_obat = ResepObat::where("ahli_id", Auth::user()->id)->first();
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {
            
            $produk = ProdukApotek::where("id_produk", $request->produk_id)->first();

            $cek_pesanan = ResepObat::where("konsumen_id", $request->konsumen_id)->first();

            if (empty($cek_pesanan)) {
                $keranjang = ResepObat::create([
                    "id_resep_obat" => "RSP-O-" . date("YmdHis"),
                    "ahli_id" => Auth::user()->id,
                    "konsumen_id" => $request->konsumen_id,
                    "tanggal" => date("Y-m-d H:i:s"),
                    "jumlah_harga" => 0,
                ]);
            }

            $pesanan_baru = ResepObat::where("konsumen_id", $request->konsumen_id)->first();

            $cek_pesanan_detail = ResepObatDetail::where("produk_id", $request->produk_id)->where("id_resep_obat", $pesanan_baru->id_resep_obat)->first();

            if (empty($cek_pesanan_detail)) {
                $detail_resep = ResepObatDetail::create([
                    "id_resep_obat_detail" => "RSP-O-D-" . date("YmdHis"),
                    "id_resep_obat" => $pesanan_baru->id_resep_obat,
                    "produk_id" => $request->produk_id,
                    "jumlah" => 1,
                    "jumlah_harga" => $produk->harga_produk * 1
                ]);
            } else {
                $pesanan_detail = ResepObatDetail::where("produk_id", $request->produk_id)->where("id_resep_obat", $pesanan_baru->id_resep_obat)->first();

                $pesanan_detail->jumlah = $pesanan_detail->jumlah + 1;

                $baru = $produk->harga_produk * 1;

                $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $baru;
                $pesanan_detail->update();
            }

            $data_resep = ResepObat::where("konsumen_id", $request->konsumen_id)->first();

            $data_resep->jumlah_harga = $data_resep->jumlah_harga + $produk->harga_produk * 1;

            $data_resep->update();

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);

        });
    }
}
