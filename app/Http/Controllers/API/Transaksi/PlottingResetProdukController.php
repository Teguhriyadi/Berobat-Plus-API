<?php

namespace App\Http\Controllers\API\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Resources\Transaksi\GetResepObatResource;
use App\Models\Apotek\Pengaturan\ProfilApotek;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Master\Obat\TransaksiObat;
use App\Models\Transaksi\ResepObatDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlottingResetProdukController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {
            $data = ResepObatDetail::join("resep_obat", "resep_obat.id_resep_obat", "=", "resep_obat_detail.id_resep_obat")
                ->join("produk", "produk.id_produk", "=", "resep_obat_detail.produk_id")
                ->get();
            
            $convert = [];
            foreach ($data as $item) {

                if (empty(Auth::user()->getProfilApotek->id_profil_apotek)) {
                    return response()->json(["pesan" => "Data Stok Obat Tidak Ada"]);
                } else {
                    $transaksi_masuk = TransaksiObat::where("kode_produk", $item->kode_produk)
                    ->where("apotek_id", Auth::user()->getProfilApotek->id_profil_apotek)
                    ->where("status", 1)
                    ->sum("qty");
                }

                $jumlah_resep = $item->jumlah;

                if ($transaksi_masuk >= $jumlah_resep) {
                    $convert[] = $item;
                } else {
                    $apoteks = ProfilApotek::whereHas("produk", function($query) use ($item, $jumlah_resep) {
                        $query->where("slug_produk", $item->slug_produk)
                            ->where("id_produk", "!=", $item->id_produk)
                            ->whereHas("transaksiObat", function($query) use ($jumlah_resep) {
                                $query->where("status", 1)
                                    ->groupBy("kode_produk")
                                    ->havingRaw("SUM(qty) >= ?", [$jumlah_resep]);
                            });
                    })->first();

                    if ($apoteks) {
                        $item->id_profil_apotek = $apoteks->id_profil_apotek;
                        $convert[] = $item;
                    }
                }
            }
            
            return GetResepObatResource::collection($convert);
        });
    }
}
