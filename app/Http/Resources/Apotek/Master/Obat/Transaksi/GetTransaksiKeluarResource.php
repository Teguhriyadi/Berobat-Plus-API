<?php

namespace App\Http\Resources\Apotek\Master\Obat\Transaksi;

use Illuminate\Http\Resources\Json\JsonResource;

class GetTransaksiKeluarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
