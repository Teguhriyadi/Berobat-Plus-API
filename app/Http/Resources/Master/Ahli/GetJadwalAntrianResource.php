<?php

namespace App\Http\Resources\Master\Ahli;

use Illuminate\Http\Resources\Json\JsonResource;

class GetJadwalAntrianResource extends JsonResource
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
            "id_jadwal_antrian" => $this->id_jadwal_antrian,
            "konsumen" => $this->konsumen,
            "ahli" => $this->user,
            "nomer_antrian" => $this->nomer_antrian,
            "status" => $this->status,
            "tanggal" => $this->tanggal
        ];
    }
}
