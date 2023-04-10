<?php

namespace App\Http\Controllers\API\Produk;

use App\Http\Controllers\Controller;
use App\Http\Resources\Apotek\Master\Produk\GetProdukResource;
use App\Models\Apotek\Produk\ProdukApotek;
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

            return GetProdukResource::collection($produk);
        });
    }

    public function store(Request $request)
    {
        $owner = Auth::user()->getApotek;
        return DB::transaction(function () use ($request, $owner) {

            ProdukApotek::create([
                "id_produk" => "PRO-" . date("YmdHis"),
                "id_owner_apotek" => $owner->id_owner_apotek,
                "nama_produk" => $request->nama_produk,
                "slug_produk" => Str::slug($request->nama_produk),
                "deskripsi_produk" => $request->deskripsi_produk,
                "harga_produk" => $request->harga_produk,
            ]);

            return response()->json(["pesan" => "Data Produk Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_produk)
    {
        return DB::transaction(function () use ($id_produk) {
            $apotek = ProdukApotek::where("id_produk", $id_produk)->first();

            return new GetProdukResource($apotek);
        });
    }

    public function update(Request $request, $id_produk)
    {
        return DB::transaction(function () use ($id_produk, $request) {

            ProdukApotek::where("id_produk", $id_produk)->update([
                "nama_produk" => $request->nama_produk,
                "slug_produk" => Str::slug($request->nama_produk),
                "deskripsi_produk" => $request->deskripsi_produk,
                "harga_produk" => $request->harga_produk,
            ]);

            return response()->json(["pesan" => "Data Produk Berhasil di Simpan"]);
        });
    }

    public function destroy($id_produk)
    {
        return DB::transaction(function () use ($id_produk) {

            ProdukApotek::where("id_produk", $id_produk)->delete();

            return response()->json(["pesan" => "Data Produk Berhasil di Hapus"]);
        });
    }
}
