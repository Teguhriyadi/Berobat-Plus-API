<?php

namespace App\Http\Controllers\API\Produk;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apotek\Master\Produk\GetProdukResource;
use App\Models\Apotek\Produk\ProdukApotek;
use App\Models\Master\Obat\TransaksiObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataProdukController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $produk = ProdukApotek::paginate(10);

            $data = [];
            foreach ($produk as $p) {
                $transaksi_masuk = TransaksiObat::where("kode_produk", $p->kode_produk)->where("status", 1)->sum("qty");

                $transaksi_keluar = TransaksiObat::where("kode_produk", $p->kode_produk)->where("status", 0)->sum("qty");

                $total_stok = $transaksi_masuk - $transaksi_keluar;
                $data[] = [
                    "id" => $p["id_produk"],
                    "owner" => $p->getOwnerApotek->getUser->nama,
                    "nama_produk" => $p["nama_produk"],
                    "slug_produk" => $p["slug_produk"],
                    "deskripsi_produk" => $p["deskripsi_produk"],
                    "harga_produk" => "Rp. " . number_format($p["harga_produk"]),
                    "qty" => $total_stok
                ];
            }

            return response()->json([
                "data" => $data
            ]);
        });
    }

    public function store(Request $request)
    {
        $owner = Auth::user()->getApotek;
        return DB::transaction(function () use ($request, $owner) {

            ProdukApotek::create([
                "kode_produk" => "PRO-" . date("YmdHis"),
                "id_owner_apotek" => $owner->id_owner_apotek,
                "nama_produk" => $request->nama_produk,
                "slug_produk" => Str::slug($request->nama_produk),
                "deskripsi_produk" => $request->deskripsi_produk,
                "harga_produk" => $request->harga_produk,
            ]);

            return response()->json(["pesan" => "Data Produk Berhasil di Tambahkan"]);
        });
    }

    public function edit($kode_produk)
    {
        return DB::transaction(function () use ($kode_produk) {
            $apotek = ProdukApotek::where("kode_produk", $kode_produk)->first();

            return new GetProdukResource($apotek);
        });
    }

    public function update(Request $request, $kode_produk)
    {
        return DB::transaction(function () use ($kode_produk, $request) {

            ProdukApotek::where("kode_produk", $kode_produk)->update([
                "nama_produk" => $request->nama_produk,
                "slug_produk" => Str::slug($request->nama_produk),
                "deskripsi_produk" => $request->deskripsi_produk,
                "harga_produk" => $request->harga_produk,
            ]);

            return response()->json(["pesan" => "Data Produk Berhasil di Simpan"]);
        });
    }

    public function destroy($kode_produk)
    {
        return DB::transaction(function () use ($kode_produk) {

            ProdukApotek::where("kode_produk", $kode_produk)->delete();

            return response()->json(["pesan" => "Data Produk Berhasil di Hapus"]);
        });
    }
}