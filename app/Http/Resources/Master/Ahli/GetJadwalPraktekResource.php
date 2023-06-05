<?php

namespace App\Http\Resources\Master\Ahli;

use Illuminate\Http\Resources\Json\JsonResource;

class GetJadwalPraktekResource extends JsonResource
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
            "id_jadwal_praktek" => $this->id_jadwal_praktek,
            "detail_praktek" => $this->detail_praktek,
            "hari" => $this->hari,
            "mulai_jam" => $this->mulai_jam,
            "selesai_jam" => $this->selesai_jam
        ];
    }
}
