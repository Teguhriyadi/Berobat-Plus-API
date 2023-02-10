<?php

namespace App\Http\Resources\Apotek\Master\Obat;

use Illuminate\Http\Resources\Json\JsonResource;

class GolonganObatResource extends JsonResource
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
            "id_golongan_obat" => $this->id_golongan_obat,
            "golongan_obat" => $this->golongan_obat
        ];
    }
}
