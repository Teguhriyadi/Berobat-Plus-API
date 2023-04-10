<?php

namespace App\Http\Resources\Apotek\Master\Produk;

use Illuminate\Http\Resources\Json\JsonResource;

class GetProdukResource extends JsonResource
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
            "owner" => $this->getOwnerApotek->getUser->nama,
            "nama_produk" => $this->nama_produk,
            "slug_produk" => $this->slug_produk,
            "deskripsi_produk" => $this->deskripsi_produk,
            "harga_produk" => $this->harga_produk
        ];
    }
}
