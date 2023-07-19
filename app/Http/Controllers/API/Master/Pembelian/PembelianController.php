<?php

namespace App\Http\Controllers\API\Master\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Transaksi\Keranjang;
use App\Models\Transaksi\KeranjangDetail;
use App\Models\Transaksi\Pembelian;
use App\Models\Transaksi\PembelianBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function store(Request $request)
    {
        return DB::transaction(function() use ($request) {
            $keranjang = Keranjang::where("id_keranjang", $request->id_keranjang)->first();

            $pembelian = Pembelian::create([
                "id_pembelian" => "PMBL-" . date("YmdHis"),
                "konsumen_id" => Auth::user()->konsumen->id_konsumen,
                "tanggal_pembelian" => date("Y-m-d"),
                "total_pembelian" => $keranjang->jumlah_harga,
                "nama_kota" => "Bandung",
                "tarif" => 5000,
                "alamat_pengiriman" => "Bandung",
                "status_pembelian" => "PENDING",
            ]);
            
            $keranjang->delete();

            $nomer = 1;
            foreach ($request->id_keranjang_detail as $index => $key) {
                $detail = KeranjangDetail::where("id_keranjang_detail", $index)->first();
                $produk = ProdukApotek::where("id_produk", $detail["produk_id"])->first();

                PembelianBarang::create([
                    "id_pembelian_barang" => "PMBL-B-".date("YmdHis") . $nomer++,
                    "id_pembelian" => $pembelian->id_pembelian,
                    "kode_produk" => $produk["kode_produk"],
                    "jumlah" => $detail["jumlah"],
                    "nama_barang" => $produk["nama_produk"],
                    "harga" => $produk["harga_produk"]
                ]);

                $detail->delete();
            }

            return response()->json(["pesan" => "Data Berhasil di Tambahkan"]);
        });
    }
}
