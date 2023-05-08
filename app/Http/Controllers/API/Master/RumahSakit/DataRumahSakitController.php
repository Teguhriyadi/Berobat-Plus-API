<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\RumahSakit\RS\GetRumahSakitResource;
use App\Models\Akun\OwnerApotek;
use App\Models\Akun\OwnerRumahSakit;
use App\Models\Akun\RumahSakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DataRumahSakitController extends Controller
{
    protected $user_id;

    public function index()
    {
        return DB::transaction(function () {
            $rs = RumahSakit::paginate(4);

            return GetRumahSakitResource::collection($rs);
        });
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {

            if ($request->file("foto_rs")) {
                $data = $request->file("foto_rs")->store("rumah_sakit");
            }

            RumahSakit::create([
                "id_rumah_sakit" => "RS-" . date("YmdHis"),
                "id_owner_rumah_sakit" => Auth::user()->getOwnerRs->id_owner_rumah_sakit,
                "nama_rs" => $request->nama_rs,
                "slug_rs" => Str::slug($request->nama_rs),
                "deskripsi_rs" => $request->deskripsi_rs,
                "kategori_rs" => 1,
                "alamat_rs" => $request->alamat_rs,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "foto_rs" => url("/storage/" . $data)
            ]);

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Tambahkan"]);
        });
    }

    public function edit($id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_rumah_sakit) {
            $rs = RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->first();
            return new GetRumahSakitResource($rs);
        });
    }

    public function update(Request $request, $id_rumah_sakit)
    {
        return DB::transaction(function () use ($request, $id_rumah_sakit) {

            if ($request->file("foto_rs")) {
                if ($request->gambarLama) {
                    Storage::delete($request->gambarLama);
                }

                $nama_gambar = $request->file("foto_rs")->store("rumah_sakit");

                $data = url("/storage/" . $nama_gambar);
            } else {
                $data = url('') . '/storage/' . $request->gambarLama;
            }

            RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->update([
                "nama_rs" => $request->nama_rs,
                "slug_rs" => Str::slug($request->nama_rs),
                "deskripsi_rs" => $request->deskripsi_rs,
                "kategori_rs" => 1,
                "alamat_rs" => $request->alamat_rs,
                "latitude" => $request->latitude,
                "longitude" => $request->longitude,
                "foto_rs" => $data
            ]);

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Simpan"]);
        });
    }

    public function destroy($id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_rumah_sakit) {

            $rumah_sakit = RumahSakit::where("id_rumah_sakit", $id_rumah_sakit)->first();

            $data = str_replace(url('storage/'), "", $rumah_sakit->foto_rs);
            Storage::delete($data);

            $rumah_sakit->delete();

            return response()->json(["pesan" => "Data Akun Rumah Sakit Berhasil di Hapus"]);
        });
    }

    public function get_rs_by_id($id_user)
    {
        return DB::transaction(function () use ($id_user) {

            $owner = OwnerRumahSakit::where("user_id", $id_user)->first();

            $rs = RumahSakit::where("id_owner_rumah_sakit", $owner["id_owner_rumah_sakit"])->get();
            
            return GetRumahSakitResource::collection($rs);
        });
    }

    public function find_nearest(Request $request)
    {
        return DB::transaction(function () use ($request) {

            $perPage = 4;
            $page = $request->get('page', 1);
            $offset = ($page - 1) * $perPage;

            $lat = $request->latitude;
            $long = $request->longitude;
            // $lat = "-6.352326";
            // $long = "108.3203647";

            $locations = DB::table('rumah_sakit')
                ->select('id_rumah_sakit', 'nama_rs', 'latitude', 'longitude', 'foto_rs', 'kategori_rs', 'alamat_rs', 'deskripsi_rs')
                ->selectRaw('(6371 * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) * cos(radians(longitude) - radians(' . $long . ')) + sin(radians(' . $lat . ')) * sin(radians(latitude)))) AS distance')
                ->orderBy('distance', 'ASC')
                ->offset($offset)
                ->limit($perPage)
                ->get()
                ->map(function ($location) {
                    $location->jarak = round($location->distance / 10, 1);
                    return $location;
                });

            $locationsCount = DB::table('rumah_sakit')
                ->selectRaw('COUNT(*) as count')
                ->first();

            $pagination = new \Illuminate\Pagination\LengthAwarePaginator(
                $locations,
                $locationsCount->count,
                $perPage,
                $page
            );

            return response()->json($pagination);
        });
    }

    public function all_find_nearest(Request $request)
    {
        $lat = $request->latitude;
        $long = $request->longitude;

        $locations = DB::table('rumah_sakit')
            ->select('id_rumah_sakit', 'nama_rs', 'latitude', 'longitude', 'kategori_rs', 'alamat_rs', 'foto_rs', 'deskripsi_rs')
            ->selectRaw('(6371 * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) * cos(radians(longitude) - radians(' . $long . ')) + sin(radians(' . $lat . ')) * sin(radians(latitude)))) AS distance')
            ->orderBy('distance', 'ASC')
            ->get()
            ->map(function ($location) {
                $location->jarak = round($location->distance / 10, 1);
                return $location;
            });

        return response()->json($locations);
    }
}
