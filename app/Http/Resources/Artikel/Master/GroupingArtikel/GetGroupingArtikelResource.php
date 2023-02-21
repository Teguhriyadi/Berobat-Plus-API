<?php

namespace App\Http\Resources\Artikel\Master\GroupingArtikel;

use Illuminate\Http\Resources\Json\JsonResource;

class GetGroupingArtikelResource extends JsonResource
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
            "id_grouping_artikel" => $this->id_grouping_artikel,
            "id_artikel" => $this->id_artikel,
            "id_kategori_artikel" => $this->id_kategori_artikel
        ];
    }
}
