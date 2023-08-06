<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ahli\ResepObat\GetDetailResepObatResource;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Transaksi\ResepObat;
use App\Models\Transaksi\ResepObatDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResepObatDetailController extends Controller
{
    public function hapus($id_konsumen)
    {
        try {
            $resep_obat = ResepObat::where("ahli_id", Auth::user()->id)
                ->where("konsumen_id", $id_konsumen)
                ->first();

            $detail = ResepObatDetail::where("id_resep_obat", $resep_obat->id_resep_obat)
                ->get();

            foreach ($detail as $d) {
                $d->delete();
            }

            $resep_obat->delete();

            return response()->json(["pesan" => "Data Berhasil di Hapus"]);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id_konsumen)
    {
        try {
            $resep_obat = ResepObat::where("ahli_id", Auth::user()->id)
                ->where("konsumen_id", $id_konsumen)
                ->first();
            
            if (!$resep_obat) {
                return response()->json(["status" => false, "message" => "Resep Obat Tidak Ditemukan"]);
            }

            $data = ResepObatDetail::where("id_resep_obat", $resep_obat->id_resep_obat)->get();
            
            return GetDetailResepObatResource::collection($data);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function kurang($id_resep_obat_detail)
    {
        try {
            $detail = ResepObatDetail::where("id_resep_obat_detail", $id_resep_obat_detail)
                ->first();

            if (empty($detail)) {
                return response()->json(["pesan" => "Data Keranjang Detail Tidak Ada"]);
            } else {
                $produk = ProdukApotek::where("id_produk", $detail->produk_id)
                    ->first();

                if ($detail->jumlah > 1) {
                    $detail->update([
                        "jumlah" => $detail->jumlah - 1,
                        "jumlah_harga" => $detail->jumlah_harga - $produk->harga_produk
                    ]);

                    $resep_obat = ResepObat::where("id_resep_obat", $detail->id_resep_obat)
                        ->first();
                    
                    $resep_obat->update([
                        "jumlah_harga" => $resep_obat->jumlah_harga - $detail->jumlah_harga
                    ]);
                    
                    return response()->json(["pesan" => "Produk Berhasil di Kurangkan"]);
                } else {
                    $resep_obat = ResepObat::where("id_resep_obat", $detail->id_resep_obat)
                        ->first();
                    
                    $resep_obat->update([
                        "jumlah_harga" => $resep_obat->jumlah_harga - $detail->jumlah_harga
                    ]);
                    
                    $detail->delete();
                    
                    return response()->json(["pesan" => "Produk Berhasil di Kurangkan"]);
                }
            }
                
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function tambah($id_resep_obat_detail)
    {
        try {
            $detail = ResepObatDetail::where("id_resep_obat_detail", $id_resep_obat_detail)
                ->first();
            
            $produk = ProdukApotek::where("id_produk", $detail->produk_id)
                ->first();
            
            $detail->update([
                "jumlah" => $detail->jumlah + 1,
                "jumlah_harga" => $detail->jumlah_harga + $produk->harga_produk
            ]);

            $jumlah_harga_keranjang = ResepObatDetail::where("id_resep_obat", $detail->id_resep_obat)
                ->sum("jumlah_harga");

            $keranjang = ResepObat::where("id_resep_obat", $detail->id_resep_obat)
                ->first();

            $keranjang->update([
                "jumlah_harga" => $jumlah_harga_keranjang
            ]);
            
            return response()->json(["pesan" => "Produk Berhasil di Tambahkan"]);
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
