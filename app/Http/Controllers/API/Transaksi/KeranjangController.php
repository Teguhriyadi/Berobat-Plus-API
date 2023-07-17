<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Transaksi\Keranjang;
use App\Models\Transaksi\KeranjangDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {

            $produk = ProdukApotek::where("id_produk", $request->produk_id)->first();

            $cek_pesanan = Keranjang::where("konsumen_id", Auth::user()->konsumen->id_konsumen)->first();

            if (empty($cek_pesanan)) {
                $keranjang = Keranjang::create([
                    "id_keranjang" => "KRNJG-" . date("YmdHis"),
                    "konsumen_id" => Auth::user()->konsumen->id_konsumen,
                    "tanggal" => date("Y-m-d"),
                    "jumlah_harga" => 0,
                    "status" => 0
                ]);
            }

            $pesanan_baru = Keranjang::where("konsumen_id", Auth::user()->konsumen->id_konsumen)->first();

            $cek_pesanan_detail = KeranjangDetail::where("produk_id", $request->produk_id)->where("keranjang_id", $pesanan_baru->id_keranjang)->first();

            if (empty($cek_pesanan_detail)) {
                $detail_keranjang = KeranjangDetail::create([
                    "id_keranjang_detail" => "D-KRNJG-" . date("YmdHis"),
                    "produk_id" => $request->produk_id,
                    "keranjang_id" => $pesanan_baru->id_keranjang,
                    "jumlah" => 1,
                    "jumlah_harga" => $produk->harga_produk * 1
                ]);
            } else {
                $pesanan_detail = KeranjangDetail::where("produk_id", $request->produk_id)->where("keranjang_id", $pesanan_baru->id_keranjang)->first();

                $pesanan_detail->jumlah = $pesanan_detail->jumlah + 1;

                $baru = $produk->harga_produk * 1;

                $pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga + $baru;
                $pesanan_detail->update();
            }

            $data_keranjang = Keranjang::where("konsumen_id", Auth::user()->konsumen->id_konsumen)->first();

            $data_keranjang->jumlah_harga = $data_keranjang->jumlah_harga + $produk->harga_produk * 1;

            $data_keranjang->update();

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
        });
    }
}
