<?php

namespace App\Http\Resources\Master\RumahSakit\Spesialis;

use App\Http\Resources\Akun\Dokter\GetDokterResource;
use Illuminate\Http\Resources\Json\JsonResource;

class GetDokterSpesialisResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id_praktek" => $this->id_praktek,
            "id_dokter" => $this->getDokter,
            "id_keahlian" => $this->getKeahlian,
            "id_spesialis" => $this->id_spesialis
        ];
    }
}
