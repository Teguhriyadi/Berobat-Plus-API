<?php

namespace App\Http\Resources\Master\Keahlian;

use Illuminate\Http\Resources\Json\JsonResource;

class GetDokterKeahlianResource extends JsonResource
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
            "id_keahlian_dokter" => $this->id_keahlian_dokter,
            "get_dokter" => $this->getDokter->getUser,
            "get_keahlian" => $this->getKeahlian
        ];
    }
}
