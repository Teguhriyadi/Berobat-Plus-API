<?php

namespace App\Http\Resources\Master\Penyakit\SpesialisPenyakit;

use Illuminate\Http\Resources\Json\JsonResource;

class GetSpesialisResource extends JsonResource
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
            "id_penyakit" => $this->id_penyakit,
            "nama_spesialis" => $this->nama_spesialis,
            "slug_spesialis" => $this->slug_spesialis
        ];
    }
}
