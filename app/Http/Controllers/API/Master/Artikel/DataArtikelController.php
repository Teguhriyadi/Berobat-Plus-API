<?php

namespace App\Http\Controllers\API\Master\Artikel;

use App\Http\Controllers\Controller;
use App\Http\Resources\Artikel\Master\DataArtikel\GetArtikelResource;
use App\Models\Artikel\DataArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataArtikelController extends Controller
{
    public function index()
    {
        return DB::transaction(function () {
            $artikel = DataArtikel::orderBy("created_at", "DESC")->with("getUser:id,nama")->paginate(10);

            return GetArtikelResource::collection($artikel);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            DataArtikel::create([
                "id_artikel" => "ART-" . date("YmdHis"),
                "judul_artikel" => $request->judul_artikel,
                "slug_artikel" => Str::slug($request->judul_artikel),
                "deskripsi" => $request->deskripsi,
                "user_id" => Auth::user()->id
            ]);

            return response()->json(["pesan" => "Data Artikel Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_artikel)
    {
        return DB::transaction(function () use ($id_artikel) {
            $artikel = DataArtikel::where("id_artikel", $id_artikel)->first();

            return new GetArtikelResource($artikel);
        });
    }

    public function update(Request $request, $id_artikel)
    {
        return DB::transaction(function () use ($id_artikel, $request) {

            DataArtikel::where("id_artikel", $id_artikel)->update([
                "judul_artikel" => $request->judul_artikel,
                "slug_artikel" => Str::slug($request->judul_artikel),
                "deskripsi" => $request->deskripsi,
            ]);

            return response()->json(["pesan" => "Data Artikel Berhasil di Simpan"]);
        });
    }

    public function destroy($id_artikel)
    {
        return DB::transaction(function () use ($id_artikel) {

            DataArtikel::where("id_artikel", $id_artikel)->delete();

            return response()->json(["pesan" => "Data Artikel Berhasil di Hapus"]);
        });
    }
}
