<?php

namespace App\Http\Resources\Transaksi;

use Illuminate\Http\Resources\Json\JsonResource;

class GetRiwayatKonsultasiResource extends JsonResource
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
            "id_transaksi_konsultasi" => $this->id_transaksi_konsultasi,
            "konsumen" => $this->konsumen->getUsers->only("nama", "nomor_hp", "email")
        ];
    }
}
