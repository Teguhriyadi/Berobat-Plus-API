<?php

namespace App\Http\Resources\Master\Dokter;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDetailPraktekResource extends JsonResource
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
            "id_detail_praktek" => $this->id_detail_praktek,
            "dokter" => $this->dokter->getUser->nama,
            "rumah_sakit" => $this->rumah_sakit->nama_rs,
            "biaya" => $this->biaya_dokter
        ];
    }
}
