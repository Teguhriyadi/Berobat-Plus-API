<?php

namespace App\Http\Resources\Apotek\Master\ProdukKategori;

use Illuminate\Http\Resources\Json\JsonResource;

class GetProdukKategoriResource extends JsonResource
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
            "produk" => $this->getProduk,
            "kategori" => $this->getKategori
        ];
    }
}
