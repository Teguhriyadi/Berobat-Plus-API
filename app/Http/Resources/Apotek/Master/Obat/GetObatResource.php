<?php

namespace App\Http\Resources\Apotek\Master\Obat;

use Illuminate\Http\Resources\Json\JsonResource;

class GetObatResource extends JsonResource
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
            "id_obat" => $this->id_obat,
            "nama_obat" => $this->nama_obat,
            "harga" => "Rp." . number_format($this->harga),
            "deskripsi" => $this->deskripsi,
            "foto" => $this->foto,
            "nama_supplier" => $this->nama_supplier,
            "asal_supplier" => $this->asal_supllier,
            "get_golongan_obat" => $this->getGolonganObat
        ];
    }
}
