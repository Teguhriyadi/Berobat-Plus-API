<?php

namespace App\Http\Controllers\API\Master\RumahSakit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Master\Ahli\GetMasterKeahlianResource;
use App\Http\Resources\Master\RumahSakit\Spesialis\GetDokterSpesialisResource;
use App\Models\Ahli\MasterJoinKeahlian;
use App\Models\Master\Penyakit\SpesialisPenyakit;
use App\Models\Master\RumahSakit\PraktekDokter;
use Illuminate\Support\Facades\DB;

class GetSpesialisDokterController extends Controller
{
    public function index($id_spesialis, $id_rumah_sakit)
    {
        return DB::transaction(function () use ($id_spesialis, $id_rumah_sakit) {
            $dokter = PraktekDokter::where("id_spesialis", $id_spesialis)->where("id_rumah_sakit", $id_rumah_sakit)->with("getKeahlian:id_keahlian,nama_keahlian")->paginate(10);

            return GetDokterSpesialisResource::collection($dokter);
        });
    }

    public function get_dokter($id_spesialis)
    {
        return DB::transaction(function () use ($id_spesialis) {
            $spesialis = SpesialisPenyakit::where("id_spesialis_penyakit", $id_spesialis)->first();

            $keahlian = $spesialis->keahlian;

            $id_keahlian = $keahlian->pluck("id_keahlian");

            $id_keahlian = $keahlian->pluck('id_keahlian');

            $master = MasterJoinKeahlian::whereIn("keahlian_id", $id_keahlian)->with("user:id,nama,id_role,nomor_hp")->with("keahlian:id_keahlian,nama_keahlian")->orderBy("id_master_join_keahlian", "DESC")->get();

            return GetMasterKeahlianResource::collection($master);
        });
    }
}
